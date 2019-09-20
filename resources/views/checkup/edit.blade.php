@extends('layouts.master')

@section('title', 'Submit checkup')

@section('content')

    <form action="{{ route('checkup.update', $menteeCheckup->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="status_comment">How have things been going with your mentor so far?</label>
			<textarea 
				class="form-control"
				id="status_comment"
				name="status_comment"
				rows="3"
				maxlength="1500"
			>{{ old('status_comment') ?? $menteeCheckup->status_comment }}</textarea>
	    </div>
		<div class="form-group">
			<label for="frequency_comment">How often do you talk or have sessions, and in what way has this been working recently?</label>
			<textarea 
				class="form-control" 
				id="frequency_comment" 
				name="frequency_comment"
				rows="3"
				maxlength="1500"
			>{{ old('frequency_comment') ?? $menteeCheckup->frequency_comment }}</textarea>
		</div>
	    <div class="form-group">
            <label for="progress_comment">What have you learnt and what do you want to learn going forward?</label>
			<textarea 
				class="form-control"
				id="progress_comment"
				name="progress_comment"
				rows="3"
				maxlength="1500"
			>{{ old('progress_comment') ?? $menteeCheckup->progress_comment }}</textarea>
	    </div>
	    <div class="form-group">
            <label for="extra_comment">Anything else you want to mention?</label>
			<textarea 
				class="form-control"
				id="extra_comment"
				name="extra_comment"
				rows="3"
				maxlength="1500"
			>{{ old('extra_comment') ?? $menteeCheckup->extra_comment }}</textarea>
	    </div>
	    <div class="form-group text-right">
            <button type="submit" class="btn btn-outline-success">Submit</button>
	    </div>
    </form>
    
	@include('layouts.error')
	
@endsection