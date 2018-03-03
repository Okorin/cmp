<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
	public function __construct() {
		$this->middleware('auth')->except('show');
	}

    public function show($id) {
    	$role = Role::findOrFail($id);

    	if ($role->visible == true) {
    		return view('role.show')->with(['users' => $role->users()->get(),
    										'role'  => $role
    									]);
    	} else {
    		return abort('404');
    	}
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
		$role->name = $request->name;
		$role->description = $request->description;
		$role->color = $request->color;
		$role->hierarchy = $request->hierarchy;
		$role->save();
	}
}
