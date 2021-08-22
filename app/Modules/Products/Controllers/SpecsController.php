<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Requests\SpecRequest;


class SpecsController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Spec $model) {
        $this->module = 'specs';
        $this->module_url = '/specs';
        $this->views = 'Products::specs';
        $this->title = trans('app.specs');
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('specs.page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));
        return view($this->views . '.index', $data);
    }

    public function getView($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model->findOrFail($id);
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];

        return view($this->views . '.view', $data);
    }



    public function getCreate() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        return view($this->views . '.create', $data);
    }
    public function postCreate(SpecRequest $request) {
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row = $this->model->create($request->all())) {
            flash()->success(trans('app.created successfully'));
             return back();
        }
        flash()->error(trans('app.failed to save'));
        return back();
    }

    public function getEdit($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '.edit', $data);
    }

    public function postEdit(SpecRequest $request , $id) {
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        $row = $this->model->findOrFail($id);
        if ($row->update($request->all())) {
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }


    public function getDelete($id) {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return redirect( '/' . $this->module);
    }
}
