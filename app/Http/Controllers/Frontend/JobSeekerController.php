<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobSeekerController extends Controller
{
	public function index(Request $request)
	{
		$query = DB::table('users as u')
					->join('job_seeker_details as jsd', 'u.id', '=', 'jsd.user_id');

		if ($request->user_job) $query->where('u.job', 'like', '%' . $request->user_job . '%');

		$jobSeekers = $query->where('u.role_id', 2)->orderBy('u.created_at', 'desc')->get();

		return view('frontend.job-seekers.index', compact('jobSeekers'));
	}

	public function show($id)
	{
		$jobSeeker = User::findOrFail($id);

		if ($jobSeeker->inRole('recruiter')) abort(404, 'Not found.');

		return view('frontend.job-seekers.show', compact('jobSeeker'));
	}
}
