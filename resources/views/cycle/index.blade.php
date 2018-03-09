@extends('layouts.master')

@section('title', 'Cycles')

@section('content')
<h2>Cycles</h2>
<p>This is a listing of all cycles!</p>
    <table class="table">
        <thead class="bg-primary thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mentor Signups</th>
                <th scope="col">Mentee Signups</th>
                <th scope="col">Cycle Duration</th>
                @can('update', new App\Cycle)
                <th scope="col">#</th>
                @endcan
            </tr>
        </thead>
        <tbody>
	@foreach($cycles as $cycle)
	        <tr
        @if($cycle->active === 1) 
            class="table-success"
        @endif
            >
                <td>{{ $cycle->id }}</td>
                <td>{{ $cycle->name }}</td>
		        <td>{{ $cycle->starts_at->format('d.m.Y') }} - {{ $cycle->ends_at->format('d.m.Y') }}</td>
		        <td>{{ $cycle->mentor_signups_start_at->format('d.m.Y') }} - {{ $cycle->mentor_signups_end_at->format('d.m.Y') }}</td>
		        <td>{{ $cycle->mentee_signups_start_at->format('d.m.Y') }} - {{ $cycle->mentee_signups_end_at->format('d.m.Y') }}</td>
                @can('update', $cycle)
                <td><a class="btn btn-primary" href="{{ route('cycle.edit', $cycle->id) }}">edit</button></td>
                @endcan
            </tr>
	@endforeach
        </tbody>
    </table>

@endsection