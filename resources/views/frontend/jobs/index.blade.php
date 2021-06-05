@extends('frontend.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			@foreach ($jobs as $job)
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
				            		<button class="btn btn-sm btn-danger" disabled>CLOSED</button>
				                @endif
			            	</div>
			                <span class="d-block">Type: {{ ucfirst($job->type) }}</span>
			                <span class="d-block">Slot: {{ $job->slot }}</span>
			                <span class="d-block">Description: {{ $job->description }}</span>
			                <a href="{{ route('frontend.jobs.show', ['id' => $job->id]) }}" class="mt-2 d-block">Show Details</a>
			            </div>
			        </div>
			    </div>
			@endforeach
		</div>		
	</div>
@endsection
