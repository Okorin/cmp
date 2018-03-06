@extends('layouts.master')

@section('title', 'Roles')

@section('content')
	<h2>Role Listing</h2>
	The following roles are defined in this application. The role listing shows its members.
	<ul class="list-group">
	@foreach($roles as $role)
	@guest
		@if($role->visible === 1)
		<li class="list-group-item"><a href="{{ route('role.view', $role->id) }}" style="color:#{{ $role->color }}"> {{ str_plural($role->name) }}</a>
		@endif
	@endguest
	@can('view', $role)
		<li class="list-group-item">
			<div class="row">
				<div class="col">
					<a href="{{ route('role.view', $role->id) }}" style="color:#{{ $role->color }}"> {{ str_plural($role->name) }}</a>
				</div>
					@can('update', $role)
						<div class="col">
							<a href="{{ route('role.update', $role->id) }}" class="btn btn-primary">update</a>
						</div>
					@endcan
					@can('delete', $role) 
	                  <div class="col">
		                  <form id="delete-role-{{ $role->id }}" action="{{ route('role.delete', $role->id) }}" method="POST">
		                      {{ csrf_field() }}
		                      <input type="hidden" name="id" value="{{ $role->id }}" />
		                      <button type="submit" class="btn btn-primary">delete</button>
		                  </form>
	              	  </div>
					@endcan
				</div>
		</li>
	@endcan
	@endforeach
	</ul>
@endsection