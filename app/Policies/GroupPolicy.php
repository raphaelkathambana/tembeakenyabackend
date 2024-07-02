<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // viewed by all users
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Group $group)
    {
        // viewed only if the user is part of the group
        return $user->groupNo === $group->groupNo
            ? Response::allow()
            : Response::deny('You are not authorized to view this group.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // created only by guides or super admins
        return $user->role === 2 || $user->role === 3
            ? Response::allow()
            : Response::deny('You are not authorized to create a group.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group)
    {
        // updates only by guides who are in the group or super admins
        return ($user->role === 2 && $user->groupNo === $group->groupNo) || $user->role === 3
            ? Response::allow()
            : Response::deny('You are not authorized to update this group.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Group $group)
    {
        // deleted only by a super admin
        return $user->role === 3
            ? Response::allow()
            : Response::deny('You are not authorized to delete this group.');
    }
}
