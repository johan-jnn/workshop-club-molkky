<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Adherent;
use App\Enums\Role;

class AdherentPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->role >= Role::CONTRIBUTOR;
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Adherent $adherent): bool
  {
    if ($user->role >= Role::CONTRIBUTOR) {
        return true;
    }

    return $user->id === $adherent->user_id;
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->role >= Role::CONTRIBUTOR;
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Adherent $adherent): bool
  {
    if ($user->role >= Role::CONTRIBUTOR) {
        return true;
    }

    return $user->id === $adherent->user_id;
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Adherent $adherent): bool
  {
    return $user->role >= Role::CONTRIBUTOR;
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Adherent $adherent): bool
  {
    return $user->role >= Role::CONTRIBUTOR;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Adherent $adherent): bool
  {
    return $user->role >= Role::CONTRIBUTOR;
  }
}
