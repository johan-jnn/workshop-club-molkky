<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adherent extends Model
{
  protected $fillable = [
    'user_id',
    'license_id',
    'registration_date',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'user_id' => 'integer',
      'license_id' => 'integer',
      'registration_date' => 'datetime',
    ];
  }

  /**
   * Get the user that owns the adherent record.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the license associated with the adherent.
   */
  public function license(): BelongsTo≤
  {
    return $this->belongsTo(License::class);
  }
}
