<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public $model;
    public $views;
    public $module;

    public function __construct() {
        $this->views = 'Dashboard';
//        $this->title = trans('app.Slider');
//        $this->model = $model;
//        $this->rules = $model->rules;
    }

    public function getIndex() {
//        authorize('view-' . $this->module);
//        $data['module'] = $this->module;
//        $data['page_title'] = trans('app.List') . " " . $this->title;
//        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->get();
        return view($this->views . '::index');
    }

    public function getCreate() {
        authorize('create-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.Create') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        // default value of index is count pf rows +1
        $data['row']->index = $data['row']->count() + 1;

        return view($this->views . '::create', $data);
    }

    public function postCreate(SliderRequest $request) {
        authorize('create-' . $this->module);
        $current_index=$this->model->count() +1;
        $new_index= (integer) $request->index;
        if ($row = $this->model->create($request->all())) {
            reArrangeIndex($current_index , $new_index , $row->id ,$this->model);
            flash()->success(trans('app.Created successfully'));
            return redirect('/' . $this->module);
        }
        flash()->error(trans('app.failed to save'));
        return back();
    }

    public function getEdit($id) {
        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.Edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '::edit', $data);
    }

    public function postEdit(SliderRequest $request , $id) {
        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        $current_index=$row->index;
        $new_index= (integer) $request->index;
        if ($row->update($request->all())) {
            reArrangeIndex($current_index , $new_index , $row->id ,$this->model);
            flash(trans('app.Update successfully'))->success();
            return back();
        }
    }

    public function getView($id) {
        authorize('view-' . $this->module);
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.View') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '::view', $data);
    }

    public function getDelete($id) {
        authorize('delete-' . $this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.Deleted Successfully'));
        return redirect( '/' . $this->module);
    }

    public function getExport() {
        authorize('view-' . $this->module);
        $rows = $this->model->getData()->get();
        if ($rows->isEmpty()) {
            flash()->error(trans('app.There is no results to export'));
            return back();
        }
        $this->model->export($rows,$this->module);
    }

}
