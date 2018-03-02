<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


	public function bindable() 
	{
		return Role::where('cycle_bindable', true)->get();
	}

    // Relationships
    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }
}
