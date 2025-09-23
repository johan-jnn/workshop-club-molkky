<?php

namespace Database\Seeders;

use Arr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    \App\Models\Homepage::insert(
      Arr::map([
        "hero.title",
        "hero.description",
        "hero.cover",
        "events.title",
        "events.cta_content",
      ], fn($key) => ["key" => $key, "value" => ""])
    );

    \App\Models\Homepage::create([
      "key" => "sections",
      "value" => json_encode([])
    ]);
  }
}
