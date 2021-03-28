<?php

namespace App\Http\Middleware;

use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Closure;

class ProductAdminIds
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::findOrFail(auth()->id());
        if ($user->getRawOriginal('type') == UserEnum::ADMIN &&
            $user->getRawOriginal('admin_type') == AdminEnum::PRODUCT_ADMIN){
            $ids = $user->products->pluck('id')->toArray();
            if (in_array($request->id , $ids)){
                return $next($request);
            }
        }
        abort(403, 'Unauthorized action.');
    }
}
