<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'address',
        'date_start',
        'date_end',
        'max_participants',
        'min_elo',
        'max_elo',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_start' => 'datetime',
            'date_end' => 'datetime',
            'max_participants' => 'integer',
            'min_elo' => 'integer',
            'max_elo' => 'integer',
        ];
    }

    /**
     * Get the reservations for the event.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the users that have reserved this event.
     */
    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Reservation::class, 'event_id', 'id', 'id', 'user_id');
    }
}
