@extends('frontend.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-12 mt-2">
		        <div class="card">
		            <div class="card-body">
		            	@if ($jobSeeker->image_profile_url)
	            			<img src="{{ Storage::url($jobSeeker->image_profile_url) }}" alt="foto profile user" class="w-50 mb-3">				            			
	            		@endif
		            	<div class="d-flex justify-content-between">
		                	<h5 class="card-title font-weight-bold text-dark">{{ $jobSeeker->name }}</h5>
		            	</div>
		                <span class="d-block">Email: {{ strtolower($jobSeeker->email) }}</span>
		                <span class="d-block">Phone Number: {{ $jobSeeker->phone_number }}</span>
		                <span class="d-block">Description: {{ $jobSeeker->description }}</span>
		                <span class="d-block">Address: {{ $jobSeeker->address }}</span>

		                <hr>
		                
		                <span class="d-block">Job: {{ $jobSeeker->job }}</span>

		                @php
		                	$jobSeekerDetail = $jobSeeker->jobSeekerDetail;
		                @endphp

		                <span class="d-block">Total Experience (month): {{ $jobSeekerDetail->total_experience }}</span>
		                <span class="d-block">Last Work Places: {{ $jobSeekerDetail->work_places_experience }}</span>
		                <span class="d-block">Last Education Level: {{ $jobSeekerDetail->last_education_level }}</span>
		                <span class="d-block">Last Education Name: {{ $jobSeekerDetail->last_education_name }}</span>
		                <span class="d-block">Languages: {{ $jobSeekerDetail->languages }}</span>
		                <span class="d-block">Skills: {{ $jobSeekerDetail->skills }}</span>
		                <span class="d-block">Resume: <a href="{{ Storage::url($jobSeekerDetail->resume_url) }}" target="_blank">Lihat Resume</a></span>

	                	<button class="btn btn-primary btn-sm mt-3">Add as a Candidate!</button>
		            </div>
		        </div>
		    </div>
		</div>		
	</div>
@endsection
