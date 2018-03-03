<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLES = ['Admin' => 1,
                   'Organizer' => 2,
                   'Mentor' => 3,
                   'Mentee' => 4,];
	

	public function bindable() 
	{
		return $this->cycle_bindable;
	}

    // Relationships
    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }
}
