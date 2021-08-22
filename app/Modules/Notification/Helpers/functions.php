<?php
//

use App\Modules\Notification\Notification;

if (! function_exists('create_new_notification')) {
    function create_new_notification($description , $to , $user_id ,$related_element_id ,$related_element_type)
    {
        try {
            $notification =[
                'description'=>$description,
                'to'=> $to,
                'user_id'=> $user_id,
                'related_element_id'=> $related_element_id ,
                'related_element_type'=>$related_element_type
            ];
            Notification::create($notification);
        }catch (\Exception $exception){
            \Illuminate\Support\Facades\Log::error($exception->getMessage());
        }
     }
}
