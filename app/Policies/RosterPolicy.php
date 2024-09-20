<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Roster;
use Illuminate\Auth\Access\HandlesAuthorization;

class RosterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the roster can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list rosters');
    }

    /**
     * Determine whether the roster can view the model.
     */
    public function view(User $user, Roster $model): bool
    {
        return $user->hasPermissionTo('view rosters');
    }

    /**
     * Determine whether the roster can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create rosters');
    }

    /**
     * Determine whether the roster can update the model.
     */
    public function update(User $user, Roster $model): bool
    {
        return $user->hasPermissionTo('update rosters');
    }

    /**
     * Determine whether the roster can delete the model.
     */
    public function delete(User $user, Roster $model): bool
    {
        return $user->hasPermissionTo('delete rosters');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete rosters');
    }

    /**
     * Determine whether the roster can restore the model.
     */
    public function restore(User $user, Roster $model): bool
    {
        return false;
    }

    /**
     * Determine whether the roster can permanently delete the model.
     */
    public function forceDelete(User $user, Roster $model): bool
    {
        return false;
    }
}
