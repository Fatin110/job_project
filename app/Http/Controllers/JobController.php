<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        //$jobs = Job::with('employer')->get(); //eager loading (for each job, get me the employer with it)

        //$jobs = Job::with('employer')->paginate(3);

        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        //$jobs = Job::with('employer')->cursorPaginate(3);


        return view('jobs.index', data: ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {
        // $job = Job::find($id);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize

        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        //update the job
        // $job = Job::find($id);
        // $job = Job::findOrFail($id);

        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);


        //redirect to specific job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job) {
         //authorize

    //delete the job
    // $job = Job::findOrFail($id);
    $job->delete();
    // Job::findOrFail($id)->delete();

    //redirect
    return redirect('/jobs');
    }
}
