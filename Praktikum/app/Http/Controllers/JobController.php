<?php

namespace App\Http\Controllers;

use App\Job;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class JobController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', Job::Class);
        $request->validate([
            'jobname'=>'required|max:255',
            'employed'=>'required|max:255'
        ]);

        $job = new Job;
        $job->jobname = $request->jobname;
        $job->employed = $request->employed;
        $job->user_id = $request->user()->user_id;
        $job->save();
        return redirect('/jobs/')->with('success', 'Job saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Job::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($job_id)
    {
        $this->authorize('update',$job = Job::find($job_id));
        $job = Job::find($job_id);
        return view('jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $job_id)
    {

        $this->authorize('update',$job = Job::findOrFail($job_id));
        $job = Job::findOrFail($job_id);
        $job->update($request->all());

        return redirect('/jobs/')->with('success', 'Job updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$job_id)
    {
        $this->authorize('delete', $job = Job::findOrFail($job_id));
        $job = Job::findOrFail($job_id);
        $job->delete();

        return response()->json(null, 204);
    }
}
