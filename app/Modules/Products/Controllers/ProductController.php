<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Productspec;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Models\Specvalue;
use App\Modules\Products\Requests\ProductRequest;
use App\Modules\Products\Requests\ProductSpecRequest;
use App\Modules\Products\Requests\ProductSpecValueRequest;
use Illuminate\Http\Request;


class ProductController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Product $model) {
        $this->module = 'product';
        $this->module_url = '/product';
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
        $data['rows'] = $this->model
            ->Filtered()
            ->orderBy("id","DESC")
            ->paginate(request('per_page'));
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

    public function getAddProductSpec($product_id)
    {
        $productSpecs =Productspec::where('product_id',$product_id)->pluck('spec_id');
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['categories'] = Category::Active()->pluck('title','id');
        $data['page_title'] = trans('products.add_product_spec');
        $data['breadcrumb'] = [
            $this->title => $this->module_url ,
            trans('app.view') .' '.$this->title =>$this->module_url.'/view/'.$product_id
        ];
        $data['rows'] = Spec::Active()->whereNotIn('id',$productSpecs)->orderBy('id','desc')->get();
        $data['row'] = $this->model;
        $data['row']->product_id = $product_id;

        return view($this->views . '.create_product_spec', $data);
    }
    public function postAddProductSpec(ProductSpecRequest $request,$product_id)
    {
        $row =$this->model->findOrFail($product_id);
        $row->specs()->attach([$request->spec_id]);
        flash()->success(trans('app.deleted successfully'));
        return back();
    }

    public function getDeleteProductSpec($product_spec_id)
    {
        $row = Productspec::findOrFail($product_spec_id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }
    public function getViewProductSpecValues($product_spec_id)
    {
        $row =Productspec::findOrFail($product_spec_id);

        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('products.view spec values');
        $data['breadcrumb'] = [$this->title => $this->module_url ,
            trans('app.view') .' '.$this->title =>$this->module_url.'/view/'.$row->product_id
        ];
        $data['rows'] = Productspecvalue::where([['product_id',$row->product_id],['spec_id',$row->spec_id]])->get();
        $data['row'] = $row;
        return view($this->views . '.view_product_spec_values', $data);
    }
    public function getAddProductSpecValue($product_spec_id)
    {
        $productSpecs =Productspec::findOrFail($product_spec_id);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('products.add spec value');
        $data['breadcrumb'] = [
            $this->title => $this->module_url ,
            trans('app.view') .' '.$this->title =>$this->module_url.'/view/'.$productSpecs->product_id,
            trans('products.view spec values')=>$this->module_url.'/view_product_spec_values/'.$product_spec_id
            ];
        $data['specs_values'] = Productspecvalue::where([['product_id',$productSpecs->product_id],
            ['spec_id' ,$productSpecs->spec_id]])->get();
        $data['rows'] = Specvalue::Active()->get();
        $data['row']=$this->model;
        $data['row']->product_id=$productSpecs->product_id;
        $data['row']->spec_id=$productSpecs->spec_id;
        return view($this->views . '.create_product_spec_value', $data);
    }
    public function postAddProductSpecValue(ProductSpecValueRequest $request,$product_spec_id)
    {
        $spec_value =Specvalue::findOrFail($request->spec_value_id);
        $request['spec_id'] = $spec_value->spec_id;
        Productspecvalue::create($request->all());
        flash()->success(trans('app.created successfully'));
        return back();
    }
    public function getDeleteProductSpecValue($product_spec_value_id)
    {
        $row = Productspecvalue::findOrFail($product_spec_value_id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }






























    public function getAddProductSpecValueInner($product_spec_value_id)
    {
        $productSpecValue =Productspecvalue::findOrFail($product_spec_value_id);
        $productSpec=Productspec::where([['product_id',$productSpecValue->product_id],['spec_id',$productSpecValue->spec_id]])->first();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('products.add inner spec value');
        $data['breadcrumb'] = [
            $this->title => $this->module_url ,
            trans('app.view') .' '.$this->title =>$this->module_url.'/view/'.$productSpecValue->product_id,
            trans('products.view spec values')=>$this->module_url.'/view_product_spec_values/'.$productSpec->id,
            trans('products.view inner spec value')=>$this->module_url.'/view_product_spec_values_inner/'.$product_spec_value_id
        ];
        $data['rows'] = Specvalue::Active()->get();
        $data['row']=$this->model;
        $data['row']->product_id=$productSpecValue->product_id;
        $data['row']->product_spec_value_id=$product_spec_value_id;
        return view($this->views . '.create_product_spec_value_inner', $data);
    }
    public function postAddProductSpecValueInner(ProductSpecValueRequest $request,$product_spec_value_id)
    {
        $spec_value =Specvalue::findOrFail($request->spec_value_id);
        $request['spec_id'] = $spec_value->spec_id;
        Productspecvalue::create($request->all());
        flash()->success(trans('app.created successfully'));
        return back();
    }


    public function getViewProductSpecValuesInner($product_spec_value_id)
    {

        $productSpecValue = Productspecvalue::findOrFail($product_spec_value_id);
        $productSpec=Productspec::where([['product_id',$productSpecValue->product_id],['spec_id',$productSpecValue->spec_id]])->first();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('products.view inner spec value');
        $data['breadcrumb'] = [$this->title => $this->module_url ,
            trans('app.view') .' '.$this->title =>$this->module_url.'/view/'.$productSpecValue->product_id ,
            trans('products.view spec values')=>$this->module_url.'/view_product_spec_values/'.$productSpec->id
        ];
        $data['rows'] = Productspecvalue::where('parent_spec_value_id' , $product_spec_value_id)->get();
        $data['row'] = $this->model;
        $data['row']->spec_value_id = $product_spec_value_id;
        return view($this->views . '.view_product_spec_values_inner', $data);
    }
}
