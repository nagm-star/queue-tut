<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class Deploy implements ShouldQueue
// class Deploy implements ShouldQueue, ShouldBeUnique
{
    use  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        info('Started deployment ...');
            sleep(5); // simulate deployment process
            info('Deployment completed');


        /** How to use Redis for conccurnt request */

        // Redis:throttle for rateLimiter requests
        // Redis::funnel('deployments')
        // Redis::throttle('deployments')
        // ->allow(10)
        // ->every(60)
        // // ->limit(5) // only 5 instance of same job can run at same time
        // ->block(10)
        // ->then(function() {
        //     info('Started deployment ...');
        //     sleep(5); // simulate deployment process
        //     info('Deployment completed');
        // });

        /** How to use Cache for conccurnt request */

        // Cache::lock('deployments')->block(10, function(){
        //     info('Started deployment ...');
        //     sleep(5); // simulate deployment process
        //     info('Deployment completed');
        // });

    }

    // public function unique(): string
    // {
    //     return 'deployments';
    // }

    // public function uniqueFor()
    // {
    //     return 60;
    // }

    public function middleware() {
        return [
            // new WithoutOverlapping('deployments', 10) // prevent run job while another instance of same job in progress

        ];
    }
}
