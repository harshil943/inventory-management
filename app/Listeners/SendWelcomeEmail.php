<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $details = [
            'name' => $event->user->email,
            'title' => 'Mail from Bright Containers',
            'body' => 'Welcome to Bright Containers Family.'
        ];
        try {
            \Mail::to('harshil.a@simformsolutions.com')->send(new \App\Mail\welcomemail($details));
        } finally{
            return true;
        }
    }
}
