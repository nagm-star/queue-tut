<?php

namespace App\Jobs;

use App\Models\Site;
use Faker\Container\Container;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeployProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $container;
    public $site;
    /**
     * Create a new job instance.
     */
    public function __construct(Site $site)
    {
      $this->site = $site;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app()->make('deployer')
             ->deploy(
                $this->site->latesCommitHash()
             );
    }
}
