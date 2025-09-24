<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role->value >= Role::CONTRIBUTOR->value;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->id == $model->id || $user->role->value >= Role::CONTRIBUTOR->value;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->value >= Role::CONTRIBUTOR->value;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id == $model->id || $user->role->value >= Role::CONTRIBUTOR->value;
    }

    /**
     * Determine whether the user can update the role field.
     */
    public function updateRole(User $user, User $model): bool
    {
        return $user->role->value >= Role::ADMINISTRATOR;
    }

    /**
     * Determine whether the user can update the password field.
     */
    public function updatePassword(User $user, User $model): bool
    {
        return $user->id == $model->id || $user->role->value >= Role::ADMINISTRATOR;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->id == $model->id || $user->role->value >= Role::CONTRIBUTOR->value && $user->id !== $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->role->value >= Role::CONTRIBUTOR->value;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role->value >= Role::CONTRIBUTOR->value && $user->id !== $model->id;
    }
}
