<?php

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // foreach (range(1, 2) as $i)
//     // {
//     //     \App\Jobs\SendWelcomeEmail::dispatch();
//     // }

//     \App\Jobs\SendEmail::dispatch();

//     // \App\Jobs\ProcessPayment::dispatch()->onQueue('payments'); // config queue piority
//     return view('welcome');
// });

// Route::get('/', function () {
//     $chain = [
//         new \App\Jobs\PullRepo(),
//         new \App\Jobs\RunTest(),
//         new \App\Jobs\Deploy(),
//     ];

//     Bus::chain($chain)->dispatch();
//     return view('welcome');
// });
Route::get('/', function () {
    $batch = [
        new \App\Jobs\PullRepo('lara/project1'),
        new \App\Jobs\RunTest('lara/project2'),
        new \App\Jobs\Deploy('lara/project3'),
    ];

    // must add patchable trait to job class
    Bus::batch($batch)->allowFailures()->dispatch();
    // migrate batchble table
    return view('welcome');
});
