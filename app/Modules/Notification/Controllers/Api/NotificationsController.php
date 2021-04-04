<?php

namespace App\Modules\Notification\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Enums\PaymentMethodEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Paymentmethod;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Notification\Notification;
use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationsController extends Controller {

    public $model,$views,$module ,$title,$module_url;

    public function __construct(Notification $model) {
        $this->model = $model;
    }
    public function getUserNotification($user_id){
        $data=[];
        try {
            $user = User::findOrFail($user_id);
            Auth::login($user);

            if ($user->getRawOriginal('type') == UserEnum::CUSTOMER){
                $notifications = Notification::where([['to' , UserEnum::CUSTOMER] ,['user_id' , $user_id]])
                    ->orderBy('id' ,'desc')
                    ->with('user')
                    ->get();
                $unseen = $notifications->where('seen' , 0)->count();

            }
            else{
                if ($user->getRawOriginal('type') == UserEnum::SUPER_ADMIN){
                    $query = Notification::where([['to' , UserEnum::ADMIN]]);
                }elseif($user->admin_type == AdminEnum::FINANCIAL_ADMIN){
                    $query = Notification::where([['to' , UserEnum::ADMIN] ,['related_element_type' ,Moneyrequest::class]]);
                }
                elseif($user->admin_type == AdminEnum::PRODUCT_ADMIN){
//            $productIds = $user->adminProducts->pluck('id');
//            $query = Notification::where([['to' , UserEnum::ADMIN]
//                ,['related_element_type' ,Moneyrequest::class]]);
                }



                $notifications =$query->orderBy('id' ,'desc')->with('user')->get();
                $unseen = $notifications->where('seen' , 0)->count();
            }
            $trans =[
                'notifications' => trans('notifications.notifications'),
                'new_notifications' => trans('notifications.new_notifications'),
                'read_all_notifications' => trans('notifications.read_all_notifications'),
            ];

            $data =$notifications;
            return custom_response(200 ,$data , '' ,[
                'unseen' =>$unseen,
                'trans'=>$trans
            ]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data, $title.'  '.$message, []);
        }
    }

    public function deleteAllNotifications($user_id)
    {
        $data=[];
        try {
        $user = User::findOrFail($user_id);
        Auth::login($user);

        if ($user->getRawOriginal('type') == UserEnum::CUSTOMER){
            Notification::where([['to' , UserEnum::CUSTOMER] ,['user_id' , $user_id]])->delete();
        }else{
            Notification::where('to' , UserEnum::ADMIN)->delete();
        }


        return custom_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
            $message = $e->getMessage();
            $message .= '    in ' . $e->getFile();
            $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data, $title.'  '.$message, []);
        }
    }
}
