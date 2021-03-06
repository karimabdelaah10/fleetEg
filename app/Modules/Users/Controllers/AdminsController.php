<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Cars\Car;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\Models\Customer;
use App\Modules\Users\Requests\CreateUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\User;
use App\Modules\Users\UserEnums;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public $model;
    public $module,$module_url, $views ,$title;

    public function __construct(User $model)
    {
        $this->module = 'admins';
        $this->module_url = '/admins';
        $this->views = 'Users::admins';
        $this->title = trans('app.admins');
        $this->model = $model;
    }

    public function getIndex()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . ' ' . $this->title;
        $data['page_description'] = trans('admin.page description');
        $data['rows'] = $this->model->getData()->Admin()->latest()->paginate(request('per_page'));

        return view($this->views . '.index', $data);
    }
    public function getCreate()
    {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        return view($this->views . '.create', $data);
    }
    public function postCreate(CreateUserRequest $request)
    {
//        authorize('create-' . $this->module);
        $request['type'] = UserEnum::ADMIN;
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row = $this->model->create($request->all()))
        {
            flash()->success(trans('app.created successfully'));
            return redirect($this->module_url);
        }
        flash()->error(trans('app.failed to save'));
        return redirect($this->module_url);
    }

    public function getEdit($id)
    {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '.edit', $data);
    }

    public function postEdit(UpdateUserRequest $request, $id)
    {

//        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if ($row->update($request->all())) {
            flash(trans('app.update successfully'))->success();
            return redirect($this->module_url);
        }
        flash()->error(trans('app.failed to save'));
        return redirect($this->module_url);
    }

    public function getView($id)
    {
//        authorize('view-' . $this->module);
        $data['views'] = $this->views;
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '.view', $data);
    }

    public function getDelete($id)
    {
//        authorize('delete-' . $this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }
}
