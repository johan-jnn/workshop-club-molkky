<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
  protected $model = Event::class;

  public function definition(): array
  {
    $startTime = $this->faker->dateTimeBetween('+1 days', '+1 month');
    $endTime = (clone $startTime)->modify('+' . $this->faker->numberBetween(1, 8) . ' hours');

    $minElo = $this->faker->numberBetween(800, 2000);
    $maxElo = $this->faker->numberBetween($minElo + 200, 2500);

    return [
      'title' => $this->faker->sentence(3),
      'description' => $this->faker->paragraph,
      'address' => $this->faker->address,
      'start_time' => $startTime,
      'end_time' => $endTime,
      'max_participants' => $this->faker->numberBetween(10, 100),
      'min_elo' => $minElo,
      'max_elo' => $maxElo,
    ];
  }
}