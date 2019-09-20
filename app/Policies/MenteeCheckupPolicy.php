<?php

namespace App\Policies;

use App\User;
use App\MenteeCheckup;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenteeCheckupPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability) 
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the menteeCheckup.
     *
     * @param  \App\User  $user
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return mixed
     */
    public function view(User $user, MenteeCheckup $menteeCheckup)
    {
        //
    }

    /**
     * Determine whether the user can create menteeCheckups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the menteeCheckup.
     *
     * @param  \App\User  $user
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return mixed
     */
    public function update(User $user, MenteeCheckup $menteeCheckup)
    {
        return ($menteeCheckup->participant->mentee_id === $user->id || $user->isOrganizer());
    }

    /**
     * Determine whether the user can delete the menteeCheckup.
     *
     * @param  \App\User  $user
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return mixed
     */
    public function delete(User $user, MenteeCheckup $menteeCheckup)
    {
        //
    }
}
