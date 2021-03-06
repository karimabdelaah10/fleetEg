<?php

namespace App\Modules\Governorate\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Governorate\Models\Governorate;
use App\Modules\Governorate\Requests\GovernorateRequest;

class GovernorateController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Governorate $model) {
        $this->module = 'governorates';
        $this->module_url = '/governorates';
        $this->views = 'Governorate';
        $this->title = trans('app.governorate');
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('governorate.page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));
        return view($this->views . '::index', $data);
    }


    public function getCreate() {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        return view($this->views . '::create', $data);
    }
    public function postCreate(GovernorateRequest $request) {
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row = $this->model->create($request->all())) {
            flash()->success(trans('app.created successfully'));
            return redirect('/' . $this->module);
        }
        flash()->error(trans('app.failed to save'));
        return back();
    }

    public function getEdit($id) {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '::edit', $data);
    }

    public function postEdit(GovernorateRequest $request , $id) {
//        authorize('edit-' . $this->module);
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        $row = $this->model->findOrFail($id);
        if ($row->update($request->all())) {
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }


    public function getDelete($id) {
//        authorize('delete-' . $this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return redirect( '/' . $this->module);
    }
}
