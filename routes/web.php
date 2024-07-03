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


// Route::get('/', function () {
//     $batch = [
//         new \App\Jobs\PullRepo('lara/project1'),
//         new \App\Jobs\RunTest('lara/project2'),
//         new \App\Jobs\Deploy('lara/project3'),
//     ];

//     // must add patchable trait to job class
//     Bus::batch($batch)
//             ->allowFailures()
//             ->catch(function ($batch, $e) {
//                 // $batch->cancel();
//                 info('Batch Faild');
//             })
//             ->then(function ($batch) { // run after successful batch
//                 info('Batch completed');
//             })
//             ->finally(function($batch) { // run after batch completed or faild
//                 info('Batch completed or faild');
//             })
//             ->onQueue('deployments')
//             ->onConnection('database')
//             ->dispatch();
//     // migrate batchble table
//     return view('welcome');
// });

Route::get('/', function () {
    // Rase Condition it's a term describe when two or more jobs try
    //to update the same record in the database at the same time
    // setuation when tow or more processes try to make change on the same resource at the same time

    \App\Jobs\Deploy::dispatch();
    return view('welcome');
});


// Redis Cunccurncy limiter give more flexibility we can set any limit we want


//** How to cinfigure cuncerncy using cache or Redis above*/
