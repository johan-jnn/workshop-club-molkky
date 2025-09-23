<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
  protected $fillable = [
    'user_id',
    'event_id',
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
      'event_id' => 'integer',
    ];
  }

  /**
   * Get the user that owns the reservation.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the event that the reservation belongs to.
   */
  public function event(): BelongsTo
  {
    return $this->belongsTo(Event::class);
  }
}
