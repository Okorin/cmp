@extends('layouts.master')

@section('title', 'Create a new Role')

@section('content')
	<form action="{{ route('role.create') }}" method="POST">
		{{ csrf_field() }}
 		<div class="form-group">
 		  <label for="roleName">Role name</label>
	      <input type="text" class="form-control" id="roleName" name="name" placeholder="Role Name" />
	    </div>
		<div class="form-group">
			<label for="roleDescription">Role description</label>
			<textarea class="form-control" id="roleDescription" name="description" rows="3"></textarea>
		</div>
	    <div class="form-group">
	       <label for="roleColor">Role color</label>
	      <input type="text" class="form-control" id="roleColor" name="color" placeholder="Color of the role" />
	    </div>
	    <div class="form-group">
	       <label for="roleHierarchy">Role hierarchy</label>
	      <input type="text" class="form-control" id="roleHierarchy" name="hierarchy" placeholder="Hierarchy level" />
	    </div>
	    <div class="form-group">
	      <button type="submit" class="btn btn-primary">Create</button>
	    </div>
	</form>
@if ($errors->any())
    <div class="alert alert-danger">
    	The following Validation errors have occured:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection