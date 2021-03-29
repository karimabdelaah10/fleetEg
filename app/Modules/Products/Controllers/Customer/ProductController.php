<?php

namespace App\Modules\Products\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Favouriteproduct;
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
        $this->module = 'products';
        $this->module_url = '/customer-product';
        $this->views = 'Products::customer.products';
        $this->title = trans('app.products');
        $this->model = $model;
    }

    public function getIndex() {
        $catgeories_ids = $this->model->whereHas('specsvalues')->pluck('category_id')->unique();
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['row']->user = auth()->user();
        $data['row']->trans= [
            'eg' =>trans('app.egyptian_pound'),
            'loading' => trans('app.loading'),
            'more' => trans('app.more'),
            'results_found' => trans('app.results_found'),
            'add_to_wish_list' => trans('app.add_to_wish_list'),
            'remove_from_wish_list' => trans('app.remove_from_wish_list'),
            'price_range' => trans('app.price_range'),
            'categories' => trans('app.categories'),
            'view_product' => trans('products.view product'),
            'commission' => trans('products.commission'),
            'price' => trans('products.price'),
            'search_in_products' => trans('app.search_in_products'),
            'cancel' => trans('app.cancel'),
            'all' => trans('app.all'),
        ];
        $data['row']->categories = Category::whereIn('id' , $catgeories_ids)->get();
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('products.page description');
        $data['rows'] = $this->model->Filtered()->orderBy("id","DESC")->paginate(request('per_page'));
        return view($this->views . '.index', $data);
    }
    public function getView($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['breadcrumb'] = [
            $this->title => $this->module_url
        ];
        $data['row']=$this->model;
        $data['row']->user = auth()->user();
        $data['row']->product = $this->model->findOrFail($id);
        $data['row']->trans= [
            'price' =>trans('products.price'),
            'commission' =>trans('products.commission'),
            'in_stock' =>trans('products.in_stock'),
            'price_change' =>trans('products.price_change'),
            'none_option' =>trans('products.none_option'),
            'discount_option' =>trans('products.discount_option'),
            'over_price_option' =>trans('products.over_price_option'),
            'ordered_amount' =>trans('products.ordered_amount'),
            'media_url' =>trans('products.media_url'),
            'eg' =>trans('app.egyptian_pound'),
            'loading' => trans('app.loading'),
            'more' => trans('app.more'),
            'results_found' => trans('app.results_found'),
            'add_to_wish_list' => trans('app.add_to_wish_list'),
            'add_to_cart' => trans('app.add_to_cart'),
            'product_added_to_cart_title' => trans('products.product_added_to_cart_title'),
            'product_added_to_cart_message' => trans('products.product_added_to_cart_message'),
            'remove_from_wish_list' => trans('app.remove_from_wish_list'),
            'price_range' => trans('app.price_range'),
            'categories' => trans('app.categories'),
            'view_product' => trans('products.view product'),
            'search_in_products' => trans('app.search_in_products'),
            'cancel' => trans('app.cancel'),
            'all' => trans('app.all'),
            'just_now' => trans('app.just_now'),
        ];
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;

        return view($this->views . '.view', $data);
    }
    public function getFavouriteProducts() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['row']->user = auth()->user();
        $data['row']->trans= [
            'eg' =>trans('app.egyptian_pound'),
            'loading' => trans('app.loading'),
            'more' => trans('app.more'),
            'results_found' => trans('app.results_found'),
            'add_to_wish_list' => trans('app.add_to_wish_list'),
            'remove_from_wish_list' => trans('app.remove_from_wish_list'),
            'price_range' => trans('app.price_range'),
            'categories' => trans('app.categories'),
            'commission' => trans('products.commission'),
            'price' => trans('products.price'),
            'view_product' => trans('products.view product'),
            'search_in_products' => trans('app.search_in_products'),
            'cancel' => trans('app.cancel'),
            'all' => trans('app.all'),
        ];
        $data['page_title'] = trans('products.list favourite products');
        $data['page_description'] = trans('products.page description');
        $data['rows'] = $this->model->Filtered()->orderBy("id","DESC")->paginate(request('per_page'));
        return view($this->views . '.favourite-products', $data);
    }

}
