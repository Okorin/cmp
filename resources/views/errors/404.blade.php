@extends('layouts.master')

@section('title', '404')

@section('content')
	<h2>Oops, the page you were looking for couldn't be found</h2>
	A 404 Exception was thrown, how about just leaving this page and going <a href="{{ url()->previous() }}">back</a>?
@endsection