<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
  protected $table = "homepage";

  protected $fillable = [
    "key",
    "value"
  ];

  public $timestamps = false;

  protected $primaryKey = "key";
  protected $keyType = "string";

  protected $attributes = [
    "value" => ""
  ];
}
