@extends('frontend.layouts.app')

@push('styles')
	<style>
		#input-search {
			width: 95%;
			margin-right: 10px;
		}
		.user-image {
			width: 100px;
			height: 100px;
		}
	</style>
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 my-2">
				<form action="{{ route('frontend.job-seekers.index') }}" method="get">
					<div class="d-flex">
				    	<input type="text" class="form-control" id="input-search" placeholder="Type user's job..." name="user_job" value="{{ Request::query('user_job') }}">
				    	<button class="btn btn-primary">Search</button>	    								
					</div>
			    </form>				
			</div>
			@forelse ($jobSeekers as $jobSeeker)
			    <div class="col-md-6 mb-2">
			        <div class="card">
			            <div class="card-body">
			            	<div class="row mb-2">
			            		@if ($jobSeeker->image_profile_url)
				            		<div class="col-md-3">
				            			<img src="{{ Storage::url($jobSeeker->image_profile_url) }}" alt="foto profile user" class="user-image">				            			
				            		</div>
			            		@endif
		            			<div class="col-md-9 mt-auto">
					                <a href="{{ route('frontend.job-seekers.show', ['id' => $jobSeeker->user_id]) }}">
					                	<h5 class="card-title font-weight-bold text-dark">{{ $jobSeeker->name }}</h5>
					                </a>
					                <p class="user-job">{{ $jobSeeker->job }}</p>
		            			</div>
			            	</div>
			                <span class="d-block">{{ $jobSeeker->description }}</span>
			                <a href="{{ route('frontend.job-seekers.show', ['id' => $jobSeeker->user_id]) }}" class="mt-2 d-block">Show Details</a>
			            </div>
			        </div>
			    </div>
			@empty 
				<div class="col-12">
					<p>Empty.</p>			
				</div>
			@endforelse
		</div>		
	</div>
@endsection
