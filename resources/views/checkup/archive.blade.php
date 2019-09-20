@extends('layouts.master')

@section('title', 'Checkups')

@section('content')

    <form action="{{ route('checkup.archive') }}" method="get">
        <div class="form-inline">
            <label for="cycle">Select a Cycle</label>
            <select class="custom-select mx-2" name="cycle" id="cycle" style="width: auto;">
                @foreach ($cycles as $cycle)
                    <option 
                        value="{{ $cycle->id }}"
                        {{ request()->cycle == $cycle->id ? 'selected' : '' }}
                    >
                        {{ $cycle->name ?? $cycle->starts_at->toDateString() }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-outline-primary">Search</button>
        </div>
    </form>

    <hr>

    @if (isset($archiveMenteeCheckups) && count($archiveMenteeCheckups) > 0)
        <table class="table table-hover table-responsive-md">
            <thead class="thead-light">
                <tr>
                    <th>Checked By</th>
                    <th>Type</th>
                    <th>Mentee</th>
                    <th>Mentor</th>
                    <th>Frequency Rate</th>
                    <th>Potential Problems</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archiveMenteeCheckups as $checkup)
                    <tr>
                        <td>{{ $checkup->reviewer->name ?? 'Unchecked' }}</td>
                        <td>{{ $checkup->checkup_type }}</td>
                        <td>{{ $checkup->participant->mentee->name }}</td>
                        <td>{{ $checkup->participant->mentor->name }}</td>
                        <td>{{ $checkup->participant->checkup_frequency_rate }}</td>
                        <td>{{ $checkup->potential_problems }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('checkup.show', $checkup->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>no data</h4>
    @endif
    
@endsection