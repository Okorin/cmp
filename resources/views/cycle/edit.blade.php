@extends('layouts.master')

@section('title', 'Edit Cycle ' . $cycle->id)

@section('content')
	<h2>Edit Cycle {{ $cycle->id }}</h2>

    <form action="{{ route('cycle.update', $cycle->id) }}" method="post" >
        <div class="row">
            <div class="col-md-2 text-right align-middle">
                Name
            </div>

            <div class="col-md-8 form-inline mb-2 mr-sm-2">
                <label class="sr-only" for="cycleName">Name</label>

                <div class="form-group">
                    <input type="text" class="form-control" name="cycleName" id="cycleName" value="{{ $cycle->name }}" placeholder="name of the cycle">
                </div>
            </div>
        </div>

        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-2 text-right align-middle">
                Mentor Signups
            </div>

            <div class="col-md-8 form-inline">
                <label class="sr-only" for="mentorSignupsStart">Mentor Signups start at</label>

                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">from</div>
                    </div>
                    <input type="text" class="form-control" name="mentorSignupsStart" id="mentorSignupsStart" value="{{ $cycle->mentor_signups_start_at->format('Y-m-d') }}" placeholder="date in yyyy-mm-dd">
                </div>

                <label class="sr-only" for="mentorSignupsEnd">Mentor Signups end at</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">to</div>
                    </div>
                    <input type="text" class="form-control" name="mentorSignupsEnd" id="mentorSignupsEnd" value="{{ $cycle->mentor_signups_end_at->format('Y-m-d') }}" placeholder="date in yyyy-mm-dd">
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-2 text-right align-middle">
                Mentee Signups
            </div>
            <div class="col-md-8 form-inline">

                <label class="sr-only" for="menteeSignupsStart">Mentee Signups start at</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">from</div>
                    </div>
                    <input type="text" class="form-control" name="menteeSignupsStart" id="menteeSignupsStart" value="{{ $cycle->mentee_signups_start_at->format('Y-m-d') }}" placeholder="date in yyyy-mm-dd">
                </div>

                <label class="sr-only" for="menteeSignupsEnd">Mentee Signups end at</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">to</div>
                    </div>
                    <input type="text" class="form-control" class="form-control" name="menteeSignupsEnd" value="{{ $cycle->mentee_signups_end_at->format('Y-m-d') }}" id="menteeSignupsEnd" placeholder="date in yyyy-mm-dd">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 text-right align-middle">
                Cycle
            </div>
            <div class="col-md-8 form-inline">
                <label class="sr-only" for="cycleStart">Cycle starts at</label>
                <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">from</div>
                    </div>
                    <input type="text" class="form-control" name="cycleStart" id="cycleStart" value="{{ $cycle->starts_at->format('Y-m-d') }}" placeholder="date in yyyy-mm-dd">
                </div>
                <label class="sr-only" for="cycleEnd">Cycle ends at</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">to</div>
                    </div>
                    <input type="text" class="form-control" name="cycleEnd" id="cycleEnd" value="{{ $cycle->ends_at->format('Y-m-d') }}" placeholder="date in yyyy-mm-dd">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 text-right">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="yes" 
                @if($cycle->active === 1)
                    checked
                @endif
                >
                <label class="form-check-label" for="active">
                    active
                </label>
            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">modify</button>
            </div>
        </div>
    </form>
    <br />
    @include('layouts.error')
@endsection