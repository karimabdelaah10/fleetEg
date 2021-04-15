<?php

namespace App\Modules\Users\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendForgotEMail implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $row;
    public $password;

    public function __construct($row, $password) {
        $this->row = $row;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        try {
            $row = $this->row;
            $to_name = $row->name;
            $to_email = $row->email;
            $from_name = env('MAIL_FROM_NAME');
            $from_email = env('MAIL_FROM_ADDRESS');
            $data = [
                'name'=>$to_name,
                'password' => $this->password
            ];
            dd($this->row , $to_email ,$to_name ,$from_name, $from_email);
            \Mail::send('Users::emails.auth.confirm',
                $data, function($message)
                use ($from_email , $from_name , $to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('New Password');
                    $message->from($from_email , $from_name);
                });
        } catch (\Throwable $e) {
            dd($e);
            \Log::error($e);
        }
    }

}
