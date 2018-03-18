@extends('layouts.master')

@section('title', 'Edit Cycle ' . $cycle->id)
    @section('custom-css')
	    <style>
	    .border-bottom {
            border-bottom: 2px solid #e9ecef !important;
        }
		.border-top {
            border-top: 2px solid #e9ecef !important;
        }
    	</style>
	@endsection
@section('content')
	<div class="w-100 d-inline-flex p-3 border-bottom" style="justify-content:center"><h1>Edit Cycle {{ $cycle->id }}</h1></div>
        <form action="{{ route('cycle.update', $cycle->id) }}" method="post" >
		    <br>
            <div class="row">
                <div class="col-md-4 text-right align-middle">
                    <h3>Name</h3>
                </div>
                <div class="col-md-6 form-inline mb-2 mr-sm-2">
                    <label class="sr-only" for="cycleName">Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cycleName" id="cycleName" value="{{ $cycle->name }}" placeholder="name of the cycle">
                    </div>
                </div>
            </div>
            <br>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4 text-right align-middle">
                    <h3>Mentor Signups</h3>
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
            <br>
            <div class="row">
                <div class="col-md-4 text-right align-middle">
                    <h3>Mentee Signups</h3>
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
		<br>
        <div class="row border-bottom" style="padding-bottom:1em;">
            <div class="col-md-4 text-right align-middle">
                <h3>Cycle</h3>
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
		<br>
        <div class="row border-bottom" style="padding-bottom:1em;">
            <div class="col-md-4"></div>
			<div class="col-md-1">
				<label class="form-check-label" for="active">
                    <h3>Active</h3>
                </label>
			</div>
            <div class="col-md-1 align-center" style="margin-left:2em;">
			    <div class="d-flex justify-content-center" style="justify-content:center">
                <div class="p-1">
			    <input class="form-check-input" type="checkbox" id="active" name="active" value="yes" 
                @if($cycle->active === 1)
                    checked
                @endif>
				</div>
				</div>
			</div>
			<div class="col-md-6"></div>
        </div>
		<div class="d-flex justify-content-center w-100 p-3" style="justify-content:center">
            <div class="p-3">
                <button type="submit" class="btn btn-primary">Modify</button>
            </div>
		</div>
    </form>
    <br />
    @include('layouts.error')
@endsection