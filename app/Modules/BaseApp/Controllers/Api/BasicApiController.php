<?php


namespace App\Modules\BaseApp\Controllers\Api;


use App\Modules\Products\Models\Product;
use App\Modules\Products\Resources\ProductsListResource;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\Resources\UsersListResource;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;

class BasicApiController
{

    public function init(){
        return [
            'trans'=>[
                'search_input_placeholder'=>trans('app.search'),
                'products'=>trans('app.products'),
                'users'=>trans('app.users'),
            ]
        ];
    }
    public function search($search_key)
    {
        $products=[];
        $users=[];
        $user = User::findOrFail(request()->user_id);
        Auth::login($user);

        if ($user->getRawOriginal('type') == UserEnum::SUPER_ADMIN){
             $users = User::where('name' , 'like' ,'%'.$search_key.'%')
                ->orWhere('mobile_number' ,'like' ,'%'.$search_key.'%')
                ->orWhere('email' ,'like' ,'%'.$search_key.'%')
                ->orWhere('address' ,'like' ,'%'.$search_key.'%')
                 ->Customer()
             ->get();
        }
        $products = Product::where('title' , 'like' ,'%'.$search_key.'%')
            ->orWhere('description' ,'like' ,'%'.$search_key.'%')
            ->orWhere('price' ,'like' ,'%'.$search_key.'%')
            ->orWhere('commission' ,'like' ,'%'.$search_key.'%')
            ->get();


        return [
            'products' => new ProductsListResource($products),
            'users'    =>new UsersListResource($users),
        ];
    }
}
