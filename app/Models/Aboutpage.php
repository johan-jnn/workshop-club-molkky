<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutpage extends Model
{
  protected $table = "aboutpage";

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
