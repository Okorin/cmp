@extends('layouts.master')

@section('title', 'Review checkup')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h5>How have things been going with your mentor so far?</h5>
            <p>{{ $menteeCheckup->status_comment }}</p>
            <h5>How often do you talk or have sessions?</h5>
            <p>{{ $menteeCheckup->frequency_comment }}</p>
        </div>
        <div class="col-sm-6">
            <h5>What have you learnt and want to learn going forward?</h5>
            <p>{{ $menteeCheckup->progress_comment }}</p>
            <h5>Anything else you want to mention?</h5>
            <p>{{ $menteeCheckup->extra_comment }}</p>
        </div>
    </div>

    <hr>
    
    <form action="{{ route('checkup.review', $menteeCheckup->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="checkup_frequency_rate">Checkups frequency, if necessary</label>
            <select class="custom-select" id="checkup_frequency_rate" name="checkup_frequency_rate">
                <option value="regular" {{ $menteeCheckup->participant->checkup_frequency_rate == 'regular' ? 'selected' : '' }}>Regular</option>
                <option value="frequent" {{ $menteeCheckup->participant->checkup_frequency_rate == 'frequent' ? 'selected' : '' }}>Frequent</option>
            </select>
	    </div>
		<div class="form-group">
			<label for="potential_problems">Potential problems</label>
            <textarea class="form-control" id="potential_problems" name="potential_problems" rows="3">{{ $menteeCheckup->potential_problems }}</textarea>
		</div>
	    <div class="form-group text-right">
            <button type="submit" class="btn btn-outline-success">Update</button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
	    </div>
    </form>
    
    @include('layouts.error')

@endsection