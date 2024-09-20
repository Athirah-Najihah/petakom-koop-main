<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiptPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the receipt can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list receipts');
    }

    /**
     * Determine whether the receipt can view the model.
     */
    public function view(User $user, Receipt $model): bool
    {
        return $user->hasPermissionTo('view receipts');
    }

    /**
     * Determine whether the receipt can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create receipts');
    }

    /**
     * Determine whether the receipt can update the model.
     */
    public function update(User $user, Receipt $model): bool
    {
        return $user->hasPermissionTo('update receipts');
    }

    /**
     * Determine whether the receipt can delete the model.
     */
    public function delete(User $user, Receipt $model): bool
    {
        return $user->hasPermissionTo('delete receipts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete receipts');
    }

    /**
     * Determine whether the receipt can restore the model.
     */
    public function restore(User $user, Receipt $model): bool
    {
        return false;
    }

    /**
     * Determine whether the receipt can permanently delete the model.
     */
    public function forceDelete(User $user, Receipt $model): bool
    {
        return false;
    }
}
