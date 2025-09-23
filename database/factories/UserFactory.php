<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
  protected static ?string $password;

  protected $model = User::class;

  public function definition(): array
  {
    return [
      'first_name' => $this->faker->firstName(),
      'last_name' => $this->faker->lastName(),
      'email' => $this->faker->unique()->safeEmail(),
      'birthdate' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
      'elo' => $this->faker->numberBetween(800, 2500),
      'phone_number' => $this->faker->phoneNumber(),
      'address' => $this->faker->address(),
      'password' => static::$password ??= Hash::make('password'),
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'role' => $this->faker->randomElement(Role::cases()),
    ];
  }

  public function unverified(): static
  {
    return $this->state(fn(array $attributes) => [
      'email_verified_at' => null,
    ]);
  }

  // États spécifiques pour les rôles (optionnel mais pratique)
  public function admin(): static
  {
    return $this->state(fn(array $attributes) => [
      'role' => Role::ADMINISTRATOR,
    ]);
  }
}