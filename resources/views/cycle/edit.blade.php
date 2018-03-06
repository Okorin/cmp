@extends('layouts.master')

@section('title', 'Edit Cycle ' . $cycle->id)

@section('content')
	<h2>Edit Cycle {{ $cycle->id }}</h2>
	Needs a form to handle cycle edits, $cycle contains the cycle of the id.
@endsection