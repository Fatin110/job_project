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

//index
Route::get('/jobs', function () {
    //$jobs = Job::with('employer')->get(); //eager loading (for each job, get me the employer with it)

    //$jobs = Job::with('employer')->paginate(3);

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    //$jobs = Job::with('employer')->cursorPaginate(3);


    return view('jobs.index', data: ['jobs' => $jobs]);
});

//create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    // $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('jobs.show', ['job' => $job]);
});

//store
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

//edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    //authorize

    //update the job
    // $job = Job::find($id);
    $job = Job::findOrFail($id);

    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);


    //redirect to specific job page
    return redirect('/jobs/' . $job->id);
});

//Delete
Route::delete('/jobs/{id}', function ($id) {
    //authorize

    //delete the job
    // $job = Job::findOrFail($id);
    // $job->delete();
    Job::findOrFail($id)->delete();

    //redirect
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('/contact');
});





//returning array
// Route::get('/about', function(){
//     return ['foo' => 'bar'];
// });
