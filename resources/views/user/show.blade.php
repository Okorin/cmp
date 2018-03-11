@extends('layouts.master')

@section('title', $user->name . '\'s userpage')

@section('content')
    <h1 style="color:#{{ $user->getColor() }}">{{ $user->name }}</h1>
    <strong>{{ $user->getTitle() }}</strong><br />
    @foreach($modeparticipants as $key => $participants)
        @if(!$participants->isEmpty())
            {{ $gamemodes[$key-1]->name }}
        @endif
        @foreach($participants as $participant)
        <a href="{{ route('cycle.show', $participant->cycle->id) }}">
            <span class="badge badge-primary" style="background-color:#{{ $participant->role->color }}">{{ $participant->role->name }} - Cycle {{ $participant->cycle->id }}</span>
        </a>
        @endforeach
    @endforeach
@endsection 