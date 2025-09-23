<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class License extends Model
{
  protected $fillable = [
    'name',
    'description',
    'period_limit'
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'period_limit' => 'datetime'
    ];
  }

  /**
   * Get the adherents for the license.
   */
  public function adherents(): HasMany
  {
    return $this->hasMany(Adherent::class);
  }
}
