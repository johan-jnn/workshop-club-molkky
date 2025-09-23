<?php

namespace Database\Factories;

use App\Models\License;
use Illuminate\Database\Eloquent\Factories\Factory;

class LicenseFactory extends Factory
{
  protected $model = License::class;

  public function definition(): array
  {
    $licenseTypes = [
      'Licence Découverte',
      'Licence Loisir',
      'Licence Compétition',
      'Licence Elite',
      'Pass Journée',
      'Pass Weekend'
    ];

    return [
      'name' => $this->faker->randomElement($licenseTypes),
      'description' => $this->faker->sentence(),
      'price' => $this->faker->randomFloat(2, 5, 150),
      'period_limit' => $this->faker->dateTimeBetween('now', '+1 year'),
    ];
  }
}