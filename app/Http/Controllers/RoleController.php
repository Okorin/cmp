<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
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
}
