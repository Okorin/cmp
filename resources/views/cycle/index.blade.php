@extends('layouts.master')

@section('title', 'Cycles')

@section('content')
<h2>Cycles</h2>
	@foreach($cycles as $cycle)
		{{ $cycle->id }}
		{{ $cycle->starts_at->diffForHumans() }}
		{{ $cycle->ends_at->diffForHumans() }}
		{{ $cycle->mentor_signups_start_at->diffForHumans() }}
		{{ $cycle->mentor_signups_end_at->diffForHumans() }}
		{{ $cycle->mentee_signups_start_at->diffForHumans() }}
		{{ $cycle->mentee_signups_end_at->diffForHumans() }}
	@endforeach

@endsection