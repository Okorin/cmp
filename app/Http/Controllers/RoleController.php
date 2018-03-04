<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
	public function __construct() {
		$this->middleware('auth')->except('show', 'index');
	}

    public function show($id) {
    	$role = Role::findOrFail($id);
    	if (auth()->guest() && $role->visible !== 1) {
    		return abort(404);
	    } 
	    if(auth()->user()) {
	    	if(!auth()->user()->can('view', $role)) {
	    		return abort(404);
	    	}
	    }
		return view('role.show')->with(['users' => $role->users()->get(),
										'role'  => $role
									]);
	}

	public function showCreationForm() 
	{
		$this->authorize('create', Role::class);
		return view('role.create');
	}

	public function create(Request $request) 
	{
		$this->authorize('create', Role::class);
		$request->validate([
			'name' => 'required|unique:roles',
			'description' => 'required',
			'color' => 'required|max:6',
			'hierarchy' => 'required|unique:roles',
		]);

		$role = new Role;
		$role->name         = e($request->name);
		$role->description  = e($request->description);
		$role->color 		= e($request->color);
		$role->hierarchy    = e($request->hierarchy);
		if ($role->save()) return back();
	}

// tries to update the role
	public function update($id, Request $request) 
	{
		$role = Role::findOrFail($id);
		$this->authorize('update', $role);
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'color' => 'required|max:6',
			'hierarchy' => 'required',
		]);
		$role->name         = e($request->name);
		$role->description  = e($request->description);
		$role->color 		= e($request->color);
		$role->hierarchy    = e($request->hierarchy);
		if ($role->save()) return back();

	}

// Returns the update form
	public function showUpdateForm($id) 
	{
		$role = Role::findOrFail($id);
		$this->authorize('update', $role);
		return view('role.update')->with(['role' => $role]);
	}

	public function index() 
	{
		$role = Role::all();
		return view('role.index')->with(['roles' => $role]);
	}

	public function delete($id)
	{
		$role = Role::findOrFail($id);
		$this->authorize('delete', $role);
		return $role->delete() ? back() : abort(403);
	}
}
