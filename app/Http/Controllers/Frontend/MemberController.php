<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobSeekerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function editProfile()
    {
    	$user = Auth::user();

    	return view('frontend.member.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request) 
    {
    	// uploadImage($image, $model, $folderName

    	$user = Auth::user();

    	$imageProfileUrl = $user->image_profile_url;

    	if ($request->hasFile('image_profile')) {
    		$imageProfileUrl = uploadImage($request->file('image_profile'), $user, 'user-images');

    		if ($user->image_profile_url) Storage::delete($user->image_profile_url);
    	}
    	
    	$user->job = $request->job;
    	$user->address = $request->address;
    	$user->description = $request->description;
    	$user->image_profile_url = $imageProfileUrl;
    	$user->save();

    	if ($user->role_id == 2) {
    		$resumeUrl = $user->jobSeekerDetail ? $user->jobSeekerDetail->resume_url : null;

    		if ($request->hasFile('resume')) {
    			$resumeUrl = uploadImage($request->file('resume'), $user, 'user-resumes');

    			if ($user->jobSeekerDetail && $user->jobSeekerDetail->resume_url) Storage::delete($user->jobSeekerDetail->resume_url);
    		}

			$jobSeekerDetail = $user->jobSeekerDetail ? $user->jobSeekerDetail : new JobSeekerDetail();
			$jobSeekerDetail->user_id = $user->id;
			$jobSeekerDetail->total_works_experience = $request->total_works_experience;
			$jobSeekerDetail->work_places_experience = $request->work_places_experience;
			$jobSeekerDetail->last_education_level = $request->last_education_level;
			$jobSeekerDetail->last_education_name = $request->last_education_name;
			$jobSeekerDetail->languages = $request->languages;
			$jobSeekerDetail->resume_url = $resumeUrl;
			$jobSeekerDetail->skills = $request->skills;
			$jobSeekerDetail->save();
    	}

    	return redirect()->route('frontend.member.profile')->with('success', 'Berhasil memperbarui profile!');
    }

    public function profile()
    {
    	$user = Auth::user();

    	return view('frontend.member.profile', compact('user'));
    }
}
