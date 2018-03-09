@extends('layouts.master')

@section('title', 'Update ' . $role->name)

@section('content')
	<form action="{{ route('role.update', $role->id) }}" method="POST">
		{{ csrf_field() }}
 		<div class="form-group">
 		  <label for="roleName">Role name</label>
	      <input type="text" class="form-control" id="roleName" name="name" placeholder="Role Name" value="{{ $role->name }}" />
	    </div>
		<div class="form-group">
			<label for="roleDescription">Role description</label>
			<textarea class="form-control" id="roleDescription" name="description" rows="3">{{ $role->description }}</textarea>
		</div>
	    <div class="form-group">
	       <label for="roleColor">Role color</label>
	      <input type="text" class="form-control" id="roleColor" name="color" placeholder="Color of the role" value="{{ $role->color }}"/>
	    </div>
	    <div class="form-group">
	       <label for="roleHierarchy">Role hierarchy</label>
	      <input type="text" class="form-control" id="roleHierarchy" name="hierarchy" placeholder="Hierarchy level" value="{{ $role->hierarchy }}" />
	    </div>
	    <div class="form-group">
	      <button type="submit" class="btn btn-primary">update</button>
	    </div>
	</form>
    @include('layouts.error')
@endsection