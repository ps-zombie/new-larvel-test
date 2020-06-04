<?php

namespace App\Listeners;

use App\Events\AsyncNotifyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AsyncEmailNotifyEventListener
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
     * @param  AsyncNotifyEvent  $event
     * @return void
     */
    public function handle(AsyncNotifyEvent $event)
    {
        $dd = $event->params;
        \Log::info("Async_Email_Notify_Event_Listener OK!".$dd);
        \Log::info("Async_Email_Notify_Event_Listener OK!");
    }
}
