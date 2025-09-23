<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title',
    'description',
    'address',
    'start_time',
    'end_time',
    'max_participants',
    'min_elo',
    'max_elo',
  ];
}
