<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $timeout = 1; // usefull when we want to prevent our job to getting stick with third part lib or api not responding

    // public $tries = -1;  // number of retry before consider it complete failure

    // wait between fail job before rety=ry again
    // public $backoff = 2;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // throw new \Exception('Failed!'); // to semlute falure
        sleep(3);
        info('Hello');
    }

    // public function retryUntil()
    // {
    //     return now()->addMinutes(); // retry after 5 minutes
    // }
}
