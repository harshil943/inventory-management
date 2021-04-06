<?php

namespace App\Listeners;

use App\Events\ordermail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class orderEmail
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
     * @param  ordermail  $event
     * @return void
     */
    public function handle(ordermail $event)
    {
        $details = [
            'name' => $event->name,
            'title' => 'Mail from Bright Containers',
            'body' => 'Your order is placed successfully, You will get product as soon as possible.'
        ];

        // Mail::to($user->email)->send(new \App\Mail\orderMail($details));
        try {
            Mail::to('harshil.a@simformsolutions.com')->send(new \App\Mail\orderMail($details));
        } finally{
            return true;
        }
    }
}
