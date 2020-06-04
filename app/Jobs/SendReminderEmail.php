<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dd = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dd)
    {
        $this->dd = $dd;
        //
        \Log::info("SendReminderEmail  __construct OK!");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        \Log::info("SendReminderEmail OK!".$this->dd);
    }
}
