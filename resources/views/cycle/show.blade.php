@extends('layouts.master')

@section('title', 'Cycle ' . $cycle->id)

@section('content')
	<h2>Cycle {{ $cycle->id }}</h2>
    @foreach($modeparticipants as $key => $participants)
        @if(!$participants->isEmpty())
            {{ $gamemodes[$key-1]->name }}
        @endif
    	@foreach($participants as $participant) 
            <a href="{{ route('user.show', $participant->user_id) }}" style="color:#{{ $participant->role->color }}"> 
            {{ $participant->user->name }}
            </a>
        @endforeach
    @endforeach
@endsection