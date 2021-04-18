@extends('frontend.layouts.app')

@push('styles')
	<style>
		input {
			background-color: #e5e5e5 !important;
		}
	</style>
@endpush

@section('content')
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6 p-0">
		        <div class="w-100 p-3 text-white font-weight-bold" style="background-color: #1c3f94">LOGIN</div>
		        <div class="bg-white pt-2 pb-5">
		            <form style="max-width: 355px;" class="m-auto" method="post" action="{{ route('login') }}">
		            	@csrf

		                <div class="form-group mt-3">
		                    <label for="email"><span class="text-red">*</span> Email</label>
		                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" required name="email" />

		                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="form-group mt-3">
		                    <label for="password"><span class="text-red">*</span> Password</label>
		                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />

		                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		                <div class="my-2">
		                    <div class="form-group form-check">
		                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
		                        <label class="form-check-label" for="remember">Remember Me</label>
		                    </div>
		                </div>
		                <button class="btn btn-light btn-outline-dark btn-block">Submit</button>
		            </form>
		        </div>				
			</div>
		</div>
    </div>
@endsection