@extends('layouts.master')

@section('title', str_plural($role->name))

@section('content')
<h1 style="color:#{{ $role->color }}">{{ str_plural($role->name) }}</h1>
{{ $role->description }}
	<div class="row">
	@foreach($users as $user)
		<div class="col">
			<a href="" style="color:#{{ $user->getColor() }};">
				{{ $user->name }}
			</a>
		</div>
	@endforeach
	</div>
	<a href="{{ route('role.index') }}">back to listing</a>
@endsection