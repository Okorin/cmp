@extends('layouts.master')

@section('title', 'Checkups')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h4>Cycle #{{ $currentCycle->id }} {{ $currentCycle->name }}</h4>
            <div class="text-muted">(Started {{ $currentCycle->starts_at->toDateString() }})</div>
        </div>
        <div class="col-sm-6 text-right">
            <form class="form-inline" action="{{ route('checkup.create') }}" method="post">
                {{ csrf_field() }}
                <div class="custom-control custom-checkbox ml-auto">
                    <input class="custom-control-input" type="checkbox" name="only_frequents" id="only_frequents">
                    <label class="custom-control-label" for="only_frequents" value="0">For frequents?</label>
                </div>
                <button class="btn btn-outline-success ml-2">Create batch</button>
            </form>
        </div>
    </div>

    @isset($menteeCheckups['notFilled'])
        <hr>
        <h4>Not Filled</h4>

        <table class="table table-hover table-responsive-md">
            <thead class="thead-light">
                <tr>
                    <th>Poked At</th>
                    <th>Mentee</th>
                    <th>Mentor</th>
                    <th>Frequency Rate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menteeCheckups['notFilled'] as $checkup)
                    <tr>
                        <td>{{ $checkup->poked_at }}</td>
                        <td>{{ $checkup->participant->mentee->name }}</td>
                        <td>{{ $checkup->participant->mentor->name }}</td>
                        <td class="text-capitalize">{{ $checkup->participant->checkup_frequency_rate }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('checkup.edit', $checkup->id) }}">fill manually</a>
                            <form class="d-inline" action="{{ route('checkup.poke', $checkup->id) }}" method="post">
                                {{ csrf_field() }}
                                <button class="btn btn-sm btn-outline-success mb-2">poke</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset

    @isset($menteeCheckups['notReviewed'])
        <hr>
        <h4>Not Reviewed Yet</h4>

        <table class="table table-hover table-responsive-md">
            <thead class="thead-light">
                <tr>
                    <th>Type</th>
                    <th>Mentee</th>
                    <th>Mentor</th>
                    <th>Frequency Rate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menteeCheckups['notReviewed'] as $checkup)
                    <tr>
                        <td>{{ $checkup->checkup_type }}</td>
                        <td>{{ $checkup->participant->mentee->name }}</td>
                        <td>{{ $checkup->participant->mentor->name }}</td>
                        <td class="text-capitalize">{{ $checkup->participant->checkup_frequency_rate }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('checkup.editReview', $checkup->id) }}">review</a>
                            <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('checkup.show', $checkup->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
    
    @isset($menteeCheckups['reviewed'])
        <hr>
        <h4>Done</h4>

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
                @foreach ($menteeCheckups['reviewed'] as $checkup)
                    <tr>
                        <td>{{ $checkup->supervisor->name }}</td>
                        <td>{{ $checkup->checkup_type }}</td>
                        <td>{{ $checkup->participant->mentee->name }}</td>
                        <td>{{ $checkup->participant->mentor->name }}</td>
                        <td class="text-capitalize">{{ $checkup->participant->checkup_frequency_rate }}</td>
                        <td>{{ $checkup->potential_problems }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-primary mb-2" href="{{ route('checkup.show', $checkup->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
    
@endsection