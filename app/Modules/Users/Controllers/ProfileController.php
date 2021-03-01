<?php

namespace App\Modules\Users\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Users\Requests\ChangeProfilePasswordRequest;
use App\Modules\Users\Requests\UpdateProfileRequest;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {

    public $model;
    public $views;
    public $module;
    public $module_url;
    private $title;

    public function __construct(User $model) {
        $this->module = 'Profile';
        $this->module_url = '/profile';
        $this->views = 'Users';
        $this->title = 'الصفحه الشخصيه';
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['views'] = $this->views.'::profile';
        $data['page_title'] = $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->find(Auth::user()->id);
        return view($this->views . '::profile.index', $data);
    }


    public function getEdit() {
        $data['module'] = $this->module;
        $data['views'] = $this->views.'::profile';
        $data['page_title'] = trans('profile.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model->find(Auth::user()->id);
        return view($this->views . '::profile.edit', $data);
    }

    public function postEdit(UpdateProfileRequest $request) {
        $row = $this->model->findOrFail(Auth::user()->id);
        $row->update($request->except('_token'));
        return redirect()->back()->with('success', trans('profile.update profile success message'));
    }

    public function changePassword(ChangeProfilePasswordRequest $request)
    {
    $this->model->findOrFail(Auth::user()->id)->update([
        'password'=>$request->password
    ]);
        return redirect()->back()->with('success', trans('profile.update password success message'));
    }
}
