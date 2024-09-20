<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ReceiptProduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiptProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the receiptProduct can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list receiptproducts');
    }

    /**
     * Determine whether the receiptProduct can view the model.
     */
    public function view(User $user, ReceiptProduct $model): bool
    {
        return $user->hasPermissionTo('view receiptproducts');
    }

    /**
     * Determine whether the receiptProduct can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create receiptproducts');
    }

    /**
     * Determine whether the receiptProduct can update the model.
     */
    public function update(User $user, ReceiptProduct $model): bool
    {
        return $user->hasPermissionTo('update receiptproducts');
    }

    /**
     * Determine whether the receiptProduct can delete the model.
     */
    public function delete(User $user, ReceiptProduct $model): bool
    {
        return $user->hasPermissionTo('delete receiptproducts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete receiptproducts');
    }

    /**
     * Determine whether the receiptProduct can restore the model.
     */
    public function restore(User $user, ReceiptProduct $model): bool
    {
        return false;
    }

    /**
     * Determine whether the receiptProduct can permanently delete the model.
     */
    public function forceDelete(User $user, ReceiptProduct $model): bool
    {
        return false;
    }
}
