<?php

namespace App\Listeners;

use App\Events\querymail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class queryEmail
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
     * @param  querymail  $event
     * @return void
     */
    public function handle(querymail $event)
    {
        $details = [
            'name' => $event->query->email,
            'title' => 'Mail from Bright Containers',
            'body' => $event->query->query,
        ];

        // Mail::to($user->email)->send(new \App\Mail\orderMail($details));
        try {
            Mail::to('harshil.a@simformsolutions.com')->send(new \App\Mail\queryMail($details));
        } finally{
            return true;
        }
    }
}
