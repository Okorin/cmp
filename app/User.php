<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const DEFAULT_COLOR = "000000";
    const DEFAULT_TITLE = " ";

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
     *
     * @return string(6) - the user's color
     */
    public function getColor() {
       if (!is_null($this->color_override))
        { 
            return $this->color_override;
        }  else {
            if ($this->getHighestRole()) {
                return $this->getHighestRole()->color;
            } else { 
                return User::DEFAULT_COLOR; 
            }
        }
    }

    /**
     * Gets the title the user has
     *
     * @return string - the user's title
     */

    public function getTitle() {
       if (!is_null($this->title_override))
        { 
            return $this->title_override;
        }  else {
            if ($this->getHighestRole()) {
                return $this->getHighestRole()->title;
            } else { 
                return User::DEFAULT_TITLE; 
            }
        }
    }

    /*****************************************************************************
     * Role checks
     */
    public function isAdmin() {
        return ($this->roles()->find(Role::ROLES["Admin"]) !== NULL) ? true : false;
    }

    public function isMentor() {
        return ($this->roles()->find(Role::ROLES["Mentor"]) !== NULL) ? true : false;
    }

    public function isOrganizer() {
        return ($this->roles()->find(Role::ROLES["Organizer"]) !== NULL) ? true : false;
    }

    public function isMentee() {
        return ($this->roles()->find(Role::ROLES["Mentee"]) !== NULL) ? true : false;
    }
}
