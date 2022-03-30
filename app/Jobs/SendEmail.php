<?php

namespace App\Jobs;

use Mail;
use App\Mail\RegisterSuccess;
use App\Mail\ChangePasswordSuccess;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $data, $user) {
        $this->data = $data;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
            // Mail::to($this->user->email)->send(new RegisterSuccess($this->data));
    }
    public function change_password() {
        Mail::to($this->user->email)->send(new ChangePasswordSuccess($this->data));
    }
    public function register() {
        Mail::to($this->user->email)->send(new RegisterSuccess($this->data));
    }
}
