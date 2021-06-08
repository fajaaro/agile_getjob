@extends('frontend.layouts.app')

@section('content')
	<div class="jumbotron">
	    <h1 class="display-4">Welcome to <span class="font-weight-bold">GetJob!</span></h1>
	    <p class="lead">This is a simple outsourcing platform</p>
	    <hr class="my-4">
	    <p>Looking for an freelancer? You cand find it here!</p>
	    <p>Looking for a job? You cand find it here too!</p>
	    <form action="{{ route('frontend.jobs.index') }}" method="get">
	    	<input type="text" class="form-control w-50" placeholder="Type a job name..." name="name" required>
	    	<button class="btn btn-primary mt-2">Search</button>	    		
	    </form>
	</div>

@endsection