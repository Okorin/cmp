<?php

namespace App\Policies;

use App\User;
use App\Cycle;
use Illuminate\Auth\Access\HandlesAuthorization;

class CyclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Cycle  $cycle
     * @return mixed
     */

    public function before(User $user, $ability) 
    {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function view(User $user, Cycle $cycle)
    {
        //
    }

    /**
     * Determine whether the user can create cycles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isOrganizer() ? true : false;
    }

    /**
     * Determine whether the user can update the cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Cycle  $cycle
     * @return mixed
     */
    public function update(User $user, Cycle $cycle)
    {
        return $user->isOrganizer() ? true : false;
    }

    /**
     * Determine whether the user can delete the cycle.
     * actually this shouldnt be exposed at all 
     * @param  \App\User  $user
     * @param  \App\Cycle  $cycle
     * @return mixed
     */
    public function delete(User $user, Cycle $cycle)
    {
        //
    }
}
