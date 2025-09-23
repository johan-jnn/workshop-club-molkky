<?php

namespace App\Models;

use App\Enums\Role;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'role',
    'first_name',
    'last_name',
    'email',
    'birthdate',
    'elo',
    'phone_number',
    'address',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'role' => Role::class,
      'birthdate' => 'date',
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
      'elo' => 'integer',
    ];
  }

  /**
   * Get the reservations for the user.
   */
  public function reservations(): HasMany
  {
    return $this->hasMany(Reservation::class);
  }

  /**
   * Get the adherent record for the user.
   */
  public function adherent(): HasOne
  {
    return $this->hasOne(Adherent::class);
  }

  /**
   * Get the events that the user has reserved.
   */
  public function events(): HasManyThrough
  {
    return $this->hasManyThrough(Event::class, Reservation::class, 'user_id', 'id', 'id', 'event_id');
  }

  public function canAccessPanel(Panel $panel): bool
  {
    return $this->role >= Role::CONTRIBUTOR;
  }
}
