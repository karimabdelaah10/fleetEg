<?php

namespace App\Modules\Users\Controllers\Api;

use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\Users\Transformers\UserAuthTransformer;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\Users\Requests\Api\ChangePasswordRequest;
use App\Modules\Users\Requests\Api\UpdateLanguageRequest;

class TamweelUsersAPIController extends BaseApiController
{
    public $parserInterface;
    protected $user;
    protected $model;

    public function __construct(ParserInterface $parserInterface , User $user)
    {
        $this->parserInterface = $parserInterface;
        $this->model = $user;
    }

    public function listUsers()
    {
       $data= $this->model
           ->getData()
           ->orderBy('id' , 'desc')
           ->paginate(request()->per_page);
        $meta=[];
        return $this->transformDataModInclude($data , 'customer', new UserAuthTransformer() , ResourceTypes::USER , $meta);
    }
    public function testMail()
    {
        $row['confirm_token']=1111;
        \Mail::send('Users::emails.auth.confirm1', ['row' => $row], function ($mail)  {
            $subject = trans('email.Confirmation Code') . " - " . appName();
            $mail->to('karimabdelaah@gmail.com')
                ->subject($subject);
        });
        return  'Done';
    }

}
