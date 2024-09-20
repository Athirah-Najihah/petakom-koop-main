<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SaleProduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class SaleProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the saleProduct can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list saleproducts');
    }

    /**
     * Determine whether the saleProduct can view the model.
     */
    public function view(User $user, SaleProduct $model): bool
    {
        return $user->hasPermissionTo('view saleproducts');
    }

    /**
     * Determine whether the saleProduct can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create saleproducts');
    }

    /**
     * Determine whether the saleProduct can update the model.
     */
    public function update(User $user, SaleProduct $model): bool
    {
        return $user->hasPermissionTo('update saleproducts');
    }

    /**
     * Determine whether the saleProduct can delete the model.
     */
    public function delete(User $user, SaleProduct $model): bool
    {
        return $user->hasPermissionTo('delete saleproducts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete saleproducts');
    }

    /**
     * Determine whether the saleProduct can restore the model.
     */
    public function restore(User $user, SaleProduct $model): bool
    {
        return false;
    }

    /**
     * Determine whether the saleProduct can permanently delete the model.
     */
    public function forceDelete(User $user, SaleProduct $model): bool
    {
        return false;
    }
}
