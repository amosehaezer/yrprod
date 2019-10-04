<?php

namespace App\Listeners;

use App\Mail\Welcome;
use App\Events\NewUserHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewUserListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(40);

        Mail::to($event->user->email)->send(new Welcome($event->user));
    }
}
