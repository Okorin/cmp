@extends('layouts.master')

@section('title', 'Cycle ' . $cycle->id)
    @section('custom-css')
	    <style>
	    .border-right {
            border-right: 2px solid #e9ecef !important;
        }
    	</style>
	@endsection
@section('content')
	<div class="row justify-content-center">
	    <div class="d-inline-flex p-3">
	        <h1>Cycle {{ $cycle->id }}</h1>
		</div>
	</div>
	<div class="row">
    	@foreach($modeparticipants as $key => $participants)
            @if(!$participants->isEmpty())
                <div class="col-6 border-right" style="text-align:center;padding:0.2em;"><h2>{{ $gamemodes[$key-1]->name }}</h2></div>
            @endif
			<div class="col-6 divGamemode">
            <table class="table">
                <thead class="bg-primary thead-dark">
                    <tr>
                        <th scope="col">Mentor</th>
                        <th scope="col">Mentee</th>
                    </tr>
                </thead>
                <tbody>
           	@foreach($participants as $participant) 	
                    <tr>
                        <td>
        	       	       <a href="{{ route('user.show', $participant->mentor) }}" style="color:#{{ $participant->mentor->getColor() }}"> 
                                {{ $participant->mentor->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('user.show', $participant->mentor) }}" style="color:#{{ $participant->mentee->getColor() }}">
                                {{ $participant->mentee->name }}
                            </a>
                        </td>
                    </tr>
	        @endforeach
                </tbody>
            </table>
			</div>
        @endforeach
	</div>
@endsection