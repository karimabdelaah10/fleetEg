<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'mobile_number' => 'required',
        ]);

        $user =User::where('mobile_number' , $request->mobile_number)->first();
        if (!$user){
         return  'worng number';
        }
        // ToDo to change the new password to be rand text
        $user->update([
            'password' => 'password1'
        ]);
        // ToDo to SendEmail with new password to this user

        return back();
    }
}
