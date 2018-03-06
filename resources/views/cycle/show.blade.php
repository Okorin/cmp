@extends('layouts.master')

@section('title', 'Cycle ' . $cycle->id)

@section('content')
	<h2>Cycle {{ $cycle->id }}</h2>
	This could be a listing of all users that were on a cycle.
@endsection