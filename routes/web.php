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
    //$jobs = Job::with('employer')->get(); //eager loading (for each job, get me the employer with it)

    //$jobs = Job::with('employer')->paginate(3);

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    //$jobs = Job::with('employer')->cursorPaginate(3);


    return view('jobs.index', data: ['jobs' => $jobs]);
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    // $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function(){

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('/contact');
});





//returning array
// Route::get('/about', function(){
//     return ['foo' => 'bar'];
// });
