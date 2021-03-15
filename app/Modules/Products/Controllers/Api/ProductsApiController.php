<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Models\Specvalue;
use App\Modules\Products\Requests\CategoryRequest;
use App\Modules\Products\Resources\ProductsResourcePagination;

class ProductsApiController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function getFilteredProducts() {
     $products =  $this->model->Filtered()->orderBy("id","DESC")->paginate(request('per_page'));
     return new ProductsResourcePagination($products);
    }

}
