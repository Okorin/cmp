<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'osu_token', 'discord_id'
    ];

    /**
     * Defines the Relationship to the roles table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Gets the gets the highest relevant hierarchy for a user
     */
    public function getHighestRole() {
        return $this->roles()->orderBy('hierarchy')->first();
    }

    /**
     * Gets the color the user should have
     */
    public function getColor() {
        return (!is_null($this->color_override) ? $this->color_override : $this->getHighestRole()->color);
    }

}
