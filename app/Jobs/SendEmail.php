<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $retires = 3; // config job to retry for 3 times before consider it complete failure
    // public $backoff = 2; // config job to wait for 2 sec before retrying
    // public $backoff = [2, 10, 20]; // config job to wait for 2 sec before retrying, 10 sec before second retry, 20 sec before third retry
    public $maxExceptions = 3; // config job to retry for 3 times before consider it complete failure

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // throw new \Exception('faild');
        sleep(1);
        // return $this->release(); // release back to queue after 30 sec
        info('Email sent');
    }

    // function will run when job fail
    public function failed($c)
    {
       info(' Faild');
    }
}
