@extends('frontend.layouts.app')

@section('content')
	<div class="container border-0 bg-none">

		<div class="row">
			<div class="col-12 pr-0">
				@include('flash')
			</div>

			<div class="col-12 bg-white pt-3">
				<p class="font-weight-bold">Edit Job</p>

				<form class="m-auto" method="POST" action="{{ route('frontend.jobs.update', ['id' => $job->id]) }}">
					@csrf
					@method('put')

		            <div class="mt-4">
		                <div class="form-group row">
		                    <label for="inputJobName" class="col-sm-4 col-form-label">Job Name <span style="color:red">*</span> </label>
		                    <div class="col-sm-10" style="max-width: 445px; margin: auto">
		                        <input name="name" type="text" class="form-control" id="inputJobName" required value="Job1" value="{{ old('name', $job->name) }}" />
		                    </div>
		                </div>
		            </div>
			        <div class="form-group row">
			            <label for="inputJobType" class="col-sm-4 col-form-label">Job Type <span style="color:red">*</span></label>
			            <div class="col-sm-10" style="max-width: 445px; margin: auto">
			                <select class="custom-select" name="type" required>
			                	@php
			                		$types = ['onsite', 'freelance', 'remote'];
			                	@endphp

			                    <option value="">Select Job Type</option>
			                    @foreach ($types as $type)
			                    	<option value="{{ $type }}" {{ $type == $job->type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>
			        <div class="form-group row">
			            <label for="inputJobSlot" class="col-sm-4 col-form-label">Job Slot <span style="color:red">*</span></label>
			            <div class="col-sm-10" style="max-width: 445px; margin: auto">
			                <input type="number" name="slot" class="form-control" id="inputJobSlot" min="1" required value="1" value="{{ old('slot', $job->slot) }}" />
			            </div>
			        </div>
			        <div class="form-group row">
			            <label for="inputJobDesc" class="col-sm-4 col-form-label">Job Description</label>
			            <div class="col-sm-10" style="max-width: 445px; margin: auto">
			                <textarea class="form-control" name="description" id="inputJobDesc" rows="6">{{ old('description', $job->description) }}</textarea>
			            </div>
			        </div>
			        <div class="form-group row">
			            <label for="inputJobStatus" class="col-sm-4 col-form-label">Job Status <span style="color:red">*</span></label>
			            <div class="col-sm-10" style="max-width: 445px; margin: auto">
			                <select class="custom-select" name="is_open" required>
			                    <option value="1" {{ $job->is_open ? 'selected' : '' }}>Open</option>
			                    <option value="0" {{ !$job->is_open ? 'selected' : '' }}>Closed</option>
			                </select>
			            </div>
			        </div>
			        <div class="form-group row">
			            <label for="inputDate" class="col-sm-4 col-form-label">Job Expired Date</label>
			            <div class="col-sm-10" style="max-width: 445px; margin: auto">
			                <input type="date" class="form-control" id="inputDate" name="expired_at" value="{{ old('expired_at', $job->expired_at) }}" />
			            </div>
			        </div>
			        <div class="form-group row">
			            <div class="col-sm-10">
			                <button type="submit" class="btn btn-lg btn-primary">UPDATE</button>
			                <button type="button" class="btn btn-light btn-lg" id="btn-cancel-create-job">CANCEL</button>
			            </div>
			        </div>
		        </form>
			</div>

		</div>
	</div>
@endsection
