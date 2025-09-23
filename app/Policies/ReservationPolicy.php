<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reservation;
use App\Enums\Role;

class ReservationPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return $user->role->value >= Role::CONTRIBUTOR->value ;
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Reservation $reservation): bool
  {
    if ($user->role->value >= Role::CONTRIBUTOR->value ) {
        return true;
    }

    return $user->id === $reservation->user_id;
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): bool
  {
    return $user->role->value >= Role::CONTRIBUTOR->value ;
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Reservation $reservation): bool
  {
    if ($user->role->value >= Role::CONTRIBUTOR->value ) {
        return true;
    }

    return $user->id === $reservation->user_id;
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Reservation $reservation): bool
  {
    if ($user->role->value >= Role::CONTRIBUTOR->value ) {
        return true;
    }

    return $user->id === $reservation->user_id;
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Reservation $reservation): bool
  {
    return $user->role->value >= Role::CONTRIBUTOR->value ;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Reservation $reservation): bool
  {
    return $user->role->value >= Role::CONTRIBUTOR->value ;
  }
}
