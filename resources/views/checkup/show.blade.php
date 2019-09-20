@extends('layouts.master')

@section('title', 'Review checkup')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h5>Mentee: <span class="text-dark">{{ $menteeCheckup->participant->mentee->name }}</span></h5>
            @isset($menteeCheckup->reviewer)
                <h5>Checked by: <span class="text-dark">{{ $menteeCheckup->reviewer->name }}</span></h5>
            @endisset
        </div>
        <div class="col-sm-6">
            <h5>Mentor: <span class="text-dark">{{ $menteeCheckup->participant->mentor->name }}</span></h5>
        </div>
    </div>

    <hr>

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
    
    <div class="row">
        <div class="col-sm-6">
            <h5>Frequency Rate</h5>
            <p class="text-capitalize">{{ $menteeCheckup->participant->checkup_frequency_rate }}</p>
        </div>
        <div class="col-sm-6">
            <h5>Potencial Problems</h5>
            <p>{{ $menteeCheckup->potential_problems }}</p>
        </div>
    </div>
    
    <hr>

    <div class="text-right">
        <a class="btn btn-outline-secondary" href="{{ url()->previous() }}">Back</a>
    </div>

@endsection