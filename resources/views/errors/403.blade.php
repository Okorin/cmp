@extends('layouts.master')

@section('title', '403 - unauthorized')

@section('content')
	<h2>Whatever you just tried to do, you probably shouldn't be doing it</h2>
	Just go <a href="{{ url()->previous() }}">back</a> and pretend it didn't happen, maybe?
@endsection