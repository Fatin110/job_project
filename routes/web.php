<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home');


    // $jobs = Job::all(); //$jobs is a Collection
    // //dd($jobs); //all jobs
    // //dd($jobs[0]); //specific row
    // dd($jobs[0]->title); //specific row's specific data/column
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->get(); //eager loading (for each job, get me the employer with it)

    return view('jobs', data: ['jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    // $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('/contact');
});

//returning string
// Route::get('/about', function(){
//     return "About Page";
// });

//returning array
// Route::get('/about', function(){
//     return ['foo' => 'bar'];
// });
