@extends('frontend.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-12 mt-2">
		        <div class="card">
		            <div class="card-body">
		            	<div class="d-flex justify-content-between">
			                <a href="{{ route('frontend.jobs.show', ['id' => $job->id]) }}">
			                	<h5 class="card-title font-weight-bold text-dark">{{ $job->name }}</h5>
			                </a>
			                @if ($job->is_open)
			                	<a href="{{ route('frontend.jobs.show', ['id' => $job->id]) }}">
				            		<button class="btn btn-sm btn-success">OPEN</button>
			                	</a>
			            	@else 
			            		<button class="btn btn-sm btn-danger">CLOSED</button>
			                @endif
		            	</div>
		                <span class="d-block">Type: {{ ucfirst($job->type) }}</span>
		                <span class="d-block">Slot: {{ $job->slot }}</span>
		                <span class="d-block">Description: {{ $job->description }}</span>
		                <span class="d-block">Expired At: {{ $job->expired_at }}</span>

	                	<button class="btn btn-primary btn-sm mt-3" {{ !$job->is_open ? 'disabled' : ''  }}>Apply Now!</button>
		            </div>
		        </div>
		    </div>
		</div>		
	</div>
@endsection
