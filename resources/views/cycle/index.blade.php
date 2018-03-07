@extends('layouts.master')

@section('title', 'Cycles')

@section('content')
<h2>Cycles</h2>
	@foreach($cycles as $cycle)
		{{ $cycle->id }}
		{{ $cycle->starts_at->format('Y-m-d') }}
		{{ $cycle->ends_at->format('Y-m-d') }}
		{{ $cycle->mentor_signups_start_at->format('Y-m-d') }}
		{{ $cycle->mentor_signups_end_at->format('Y-m-d') }}
		{{ $cycle->mentee_signups_start_at->format('Y-m-d') }}
		{{ $cycle->mentee_signups_end_at->format('Y-m-d') }}
	@endforeach

@endsection