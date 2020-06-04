<?php

namespace App\Listeners;

use App\Events\AsyncNotifyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestEventListener implements ShouldQueue
{
    use InteractsWithQueue;
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
        $this->release(100000);
        \Log::info("test4321 OK!eeee");
    }
}
