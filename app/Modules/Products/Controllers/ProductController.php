<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Requests\ProductRequest;


class ProductController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Product $model) {
        $this->module = 'products';
        $this->module_url = '/products';
        $this->views = 'Products::products';
        $this->title = trans('app.products');
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('products.page description');
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
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['categories'] = Category::Active()->pluck('title','id');
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->is_active = 1;
        $data['row']->trans =[
            "discount"=>trans('products.discount') ,
            "on_two_pc_discount"=>trans('products.two_pc_discount') ,
            "plus_two_pc_discount"=>trans('products.plus_two_pc_discount'),
            "specs"=>trans('products.specs'),
            "add_spec"=>trans('products.add spec'),
            "add_spec_value"=>trans('products.add spec value'),
            "select_specs"=>trans('products.select specs'),
            "specs_values"=>trans('products.specs values'),
            "amount"=>trans('products.amount'),
            ];
        return view($this->views . '.create', $data);
    }
    public function postCreate(ProductRequest $request) {
//        return $request->all();
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        !empty($request->discount) ? $request['discount'] =1 : $request['discount '] =0;
        if ($row = $this->model->create($request->all())) {
            if (!empty($request->specs)){
                $specs = array_unique($request->specs);
                $row->specs()->attach($specs);
            }

            flash()->success(trans('app.created successfully'));
             return back();
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
        $data['categories'] = Category::Active()->pluck('title','id');
        $data['row'] = $this->model->findOrFail($id);
        $data['row']->trans =[
            "discount"=>trans('products.discount') ,
            "on_two_pc_discount"=>trans('products.two_pc_discount') ,
            "plus_two_pc_discount"=>trans('products.plus_two_pc_discount'),
            "specs"=>trans('products.specs'),
            "add_spec"=>trans('products.add spec'),
            "add_spec_value"=>trans('products.add spec value'),
            "select_specs"=>trans('products.select specs'),
            "specs_values"=>trans('products.specs values'),
            "amount"=>trans('products.amount'),
        ];
//        return  $data['row'];
        return view($this->views . '.edit', $data);
    }

    public function postEdit(ProductRequest $request , $id) {
//        authorize('edit-' . $this->module);
        !empty($request->is_active) ? $request['is_active'] =1 : $request['is_active'] =0;
        if (!empty($request->discount)){
            $request['discount'] =1;
        }else{
            $request['discount'] =0;
            $request['two_pc_discount']=0;
            $request['plus_two_pc_discount']=0;
        }
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
