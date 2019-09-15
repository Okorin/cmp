<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;
    const ROLES = ['Admin' => 1,
                   'Organizer' => 2,
                   'Mentor' => 3,
                   'Mentee' => 4,
                   'User' => 5,];
	

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
