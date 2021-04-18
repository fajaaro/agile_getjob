@extends('frontend.layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 p-0">
				@include('flash')

		        <div class="w-100 p-3 text-white font-weight-bold" style="background-color: #1c3f94">EDIT PROFILE</div>
		        <div class="bg-white pt-2 pb-5">
		            <form class="m-auto px-5" method="post" action="{{ route('frontend.member.edit-profile') }}" enctype="multipart/form-data">
		            	@csrf
		            	@method('put')

		            	<img src="{{ $user->image_profile_url ? Storage::url($user->image_profile_url) : '' }}" id="user-image" class="img img-fluid rounded-circle w-75 mx-auto d-block mb-3">

		                <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="image" name="image_profile" accept="image/png, image/jpeg">
	                        <label class="custom-file-label" for="image" id="label-image">Choose Image Profile</label>
	                    </div>

		                <div class="form-group mt-3">
		                    <label for="job">Job</label>
		                    <input type="text" class="form-control" id="job" name="job" placeholder="Your current job..." value="{{ old('job', $user->job ?? '') }}" />
		                </div>
		                <div class="form-group mt-3">
		                    <label for="address">Address</label>
		                    <input type="text" class="form-control" id="address" name="address" placeholder="Your current address..." value="{{ old('address', $user->address ?? '') }}" />
		                </div>
		                <div class="form-group mt-3">
		                    <label for="description">About Me</label>
		                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Write something about you...">{{ old('description', $user->description ?? '') }}</textarea>
		                </div>

		                @if ($user->role_id == 2)
		                	<hr>

			                <div class="form-group mt-3">
			                    <label for="total_works_experience">Total Works Experience (Month)</label>
			                    <input type="number" class="form-control" id="total_works_experience" name="total_works_experience" placeholder="Your current total works experience (in month)..." value="{{ old('total_works_experience', $user->jobSeekerDetail->total_works_experience ?? '') }}" />
			                </div>
			                <div class="form-group mt-3">
			                    <label for="work_places_experience">Work Places Experience</label>
			                    <input type="text" class="form-control" id="work_places_experience" name="work_places_experience" placeholder="Last places you worked (ex: Shopee, OVO)..." value="{{ old('work_places_experience', $user->jobSeekerDetail->work_places_experience ?? '') }}" />
			                </div>

			                <div class="form-group mt-3">
			                    <label for="last_education_level">Last Education Level</label>
			                    <input type="text" class="form-control" id="last_education_level" name="last_education_level" placeholder="Last education (ex: Bachelor)..." value="{{ old('last_education_level', $user->jobSeekerDetail->last_education_level ?? '') }}" />
			                </div>
			                <div class="form-group mt-3">
			                    <label for="last_education_name">Last Education Place</label>
			                    <input type="text" class="form-control" id="last_education_name" name="last_education_name" placeholder="Last education place (ex: BINUS University)..." value="{{ old('last_education_name', $user->jobSeekerDetail->last_education_name ?? '') }}" />
			                </div>

			                <div class="form-group mt-3">
			                    <label for="languages">Languages</label>
			                    <input type="text" class="form-control" id="languages" name="languages" placeholder="Language skills (ex: Indonesia, English)..." value="{{ old('languages', $user->jobSeekerDetail->languages ?? '') }}" />
			                </div>
			                <div class="form-group mt-3">
			                    <label for="skills">Skills</label>
			                    <input type="text" class="form-control" id="skills" name="skills" placeholder="Hard skills (ex: Photoshop, HTML)..." value="{{ old('skills', $user->jobSeekerDetail->skills ?? '') }}" />
			                </div>

			                <div class="custom-file mb-3">
		                        <input type="file" class="custom-file-input" id="resume" name="resume" accept=".pdf, .doc, .docx">
		                        <label class="custom-file-label" for="resume" id="label-resume">Choose Your Resume File</label>
		                    </div>
		                @endif

		                <button class="btn btn-light btn-outline-dark btn-block">Submit</button>
		            </form>
		        </div>				
			</div>
		</div>
    </div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function() {
			$('#image').on('change', function(event) {
                var userImage = document.getElementById('user-image')
                userImage.src = URL.createObjectURL(event.target.files[0])
                userImage.onload = function() {
                    URL.revokeObjectURL(userImage.src) 
                }

                $('#label-image').text(event.target.files[0].name)
            })

			$('#resume').on('change', function(event) {
                $('#label-resume').text(event.target.files[0].name)
            })
		})
	</script>
@endpush