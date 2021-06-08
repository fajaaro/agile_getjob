<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
	public function index(Request $request)
	{
        $query = DB::table('jobs');

        if ($request->name) $query->where('name', 'like', '%' . $request->name . '%');

		$jobs = $query->latest()->get();

		return view('frontend.jobs.index', compact('jobs'));
	}

    public function create()
    {
    	return view('frontend.jobs.create');
    }

    public function store(StoreJob $request)
    {
    	$job = new Job();
    	$job->recruiter_id = Auth::id();
    	$job->name = $request->name;
    	$job->type = $request->type;
    	$job->slot = $request->slot;
    	$job->description = $request->description;
    	$job->is_open = $request->is_open;
    	$job->expired_at = $request->expired_at;
    	$job->save(); 

    	return redirect(route('frontend.member.profile') . '#tabs-2')->with('success', 'Success create a new job!');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('frontend.jobs.show', compact('job'));
    }

    public function edit($id)
    {
    	$job = Job::findOrFail($id);

    	return view('frontend.jobs.edit', compact('job'));
    }

    public function update(StoreJob $request, $id)
    {
    	$job = Job::find($id);
    	$job->name = $request->name;
    	$job->type = $request->type;
    	$job->slot = $request->slot;
    	$job->description = $request->description;
    	$job->is_open = $request->is_open;
    	$job->expired_at = $request->expired_at;
    	$job->save(); 

    	// return redirect()->route('frontend.jobs.show', ['id' => $id])->with('success', "Success update job with id $id!");
        return redirect()->route('frontend.jobs.index')->with('success', "Success update job with id $id!");
    }
}
