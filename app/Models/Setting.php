<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $fillable = [
    'key',
    'label',
    'value',
  ];

  const CREATED_AT = null;
  const UPDATED_AT = 'updated_date';

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'updated_date' => 'datetime',
    ];
  }
}
