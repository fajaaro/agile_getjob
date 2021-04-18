@extends('frontend.layouts.app')

@push('styles')
	<style>
		input, select {
			background-color: #e5e5e5 !important;
		}
	</style>
@endpush

@section('content')
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6 p-0">
		        <div class="w-100 p-3 text-white font-weight-bold" style="background-color: #1c3f94">REGISTER</div>
		        <div class="bg-white pt-2 pb-5">
		            <form style="max-width: 500px; margin: auto" method="post" action="{{ route('register') }}">
		            	@csrf
		            	
		                <div class="form-group mt-3">
		                    <label for="name"><span class="text-red">*</span> Name</label>
		                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" />

		                    @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="form-group mt-3">
		                    <label for="phone_number"><span class="text-red">*</span> Phone Number</label>
		                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" />

		                    @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="form-group mt-3">
		                    <label for="email"><span class="text-red">*</span> Email</label>
		                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" />

		                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="form-group row mt-3">
		                	<div class="col">
			                    <label for="password"><span class="text-red">*</span> Password</label>
			                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />

			                    @error('password')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror		                		
		                	</div>
		                	<div class="col">
			                    <label for="password_confirmation"><span class="text-red">*</span> Confirm Password</label>
			                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />		                		
		                	</div>
		                </div>
		                <div class="form-group mt-3">
		                    <label for="role_name"><span class="text-red">*</span> Regist As</label>
		                    <select name="role_name" id="role_name" class="form-control @error('role_name') is-invalid @enderror" required>
		                    	<option value="">Select Role</option>
		                    	<option value="job seeker">Job Seeker</option>
		                    	<option value="recruiter">Recruiter</option>
		                    </select>

		                    @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
		                </div>
	                    <button class="btn btn-light btn-outline-dark btn-block mt-3">Submit</button>
		            </form>
		        </div>				
			</div>
		</div>
    </div>
@endsection