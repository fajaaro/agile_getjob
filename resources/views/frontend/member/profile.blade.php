@extends('frontend.layouts.app')

@push('styles')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style>
		ul, li {
			border: none !important;
		}

		#tabs li a {
			font-weight: bold;
		}

		.link-profile {
			border-left: 8px solid #1C3F94 !important;
		}

		.tab-content {
			padding: 30px !important;
		}

		hr {
			border: none;
		    height: 2.5px;
		    color: #C4C4C4;
		    background-color: #C4C4C4;
			border-color: #C4C4C4;
		}
	</style>
@endpush

@section('content')
	<div class="container border-0 bg-none" id="tabs">

		
		<div class="row">
			<div class="col-12 pr-0">
				@include('flash')
			</div>
			
			<div class="col-md-4">
				<ul class="list-group bg-white p-0">
					<li class="list-group-item bg-white link-profile" style="background-color: #F6F6F6 !important;">
						<div class="d-flex p-3">
							<img src="{{ $user->image_profile_url ? Storage::url($user->image_profile_url) : asset('frontend/images/profile-photo.png') }}" alt="profile-photo" class="w-25">
							<div class="ml-4 my-auto">
								<p class="font-weight-bold text-blue">{{ $user->name }}</p>
								<a href="#tabs-1" class="p-0 text-gray">See Profile</a>
							</div>
						</div>
					</li>
					<li class="list-group-item bg-white pl-2 mt-3"><a href="#tabs-2" class="text-blue">Pengalaman</a></li>
					<li class="list-group-item bg-white pl-2"><a href="#tabs-3" class="text-blue">Pendidikan</a></li>
					<li class="list-group-item bg-white pl-2"><a href="#tabs-4" class="text-blue">Bahasa</a></li>
					<li class="list-group-item bg-white pl-2"><a href="#tabs-5" class="text-blue">Resume</a></li>
					<li class="list-group-item bg-white pl-2 mb-3"><a href="#tabs-6" class="text-blue">Kemampuan</a></li>
				</ul>				
			</div>

			<div class="col-md-8 bg-white">
				<div class="tab-content" id="tabs-1">
					<div class="d-flex">
						<img src="{{ $user->image_profile_url ? Storage::url($user->image_profile_url) : asset('frontend/images/profile-photo.png') }}" alt="profile-photo" class="w-25">
						<div class="ml-4 my-auto">
							<span class="d-block text-blue font-weight-bold">{{ $user->name }}</span>
							<span class="d-block my-3 text-gray">{{ $user->job ?? '' }}</span>
							<span class="d-block text-gray">{{ $user->phone_number }} | {{ $user->email }} | {{ $user->address }}</span>
						</div>
					</div>
					<div class="mt-5">
						<h4 class="text-gray font-weight-bold">About Me</h4>

						<hr>

						<p class="text-gray">{{ $user->description ?? '' }}</p>
					</div>
				</div>
				<div class="tab-content" id="tabs-2">
					@php
						$jobSeekerDetail = $user->jobSeekerDetail;
					@endphp

					<p><span class="font-weight-bold">Lama Bekerja:</span> {{ $jobSeekerDetail->total_works_experience ?? '' }} Bulan</p>
					<p><span class="font-weight-bold">Tempat Bekerja:</span> {{ $jobSeekerDetail->work_places_experience ?? '' }}</p>
				</div>
				<div class="tab-content" id="tabs-3">
					<p><span class="font-weight-bold">Pendidikan Terakhir:</span> {{ $jobSeekerDetail->last_education_level ?? '' }}</p>
					<p><span class="font-weight-bold">Nama Lembaga Pendidikan:</span> {{ $jobSeekerDetail->last_education_name ?? '' }}</p>
				</div>
				<div class="tab-content" id="tabs-4">
					<p><span class="font-weight-bold">Bahasa Yang Dikuasai:</span> {{ $jobSeekerDetail->languages ?? '' }}</p>
				</div>			
				<div class="tab-content" id="tabs-5">
					@if ($jobSeekerDetail->resume_url)
						<a href="{{ Storage::url($jobSeekerDetail->resume_url) }}" target="_blank">Lihat Resume</a>
					@else
						<p>Belum ada resume.</p>
					@endif
				</div>			
				<div id="tabs-6">
					<p><span class="font-weight-bold">Kemampuan:</span> {{ $jobSeekerDetail->skills ?? '' }}</p>
				</div>			
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(document).ready(function() {
			$( "#tabs" ).tabs()
		})
	</script>
@endpush