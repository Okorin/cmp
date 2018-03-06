<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function before($user, $ability) 
    {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function view(User $user, Role $role)
    {
        return (boolean) $role->visible;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isOrganizer() ? true : false;

    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        // Role is given, check if user can edit this Role
        if ($role->visible === 1) 
        {
            return $user->isOrganizer() ? true : false;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role )
    {

    }

    public function manage(User $user) 
    {
        return ( $this->create($user) ||
                 $this->update($user, new Role) ||
                 $this->delete($user, new Role)
                );
    }

}
