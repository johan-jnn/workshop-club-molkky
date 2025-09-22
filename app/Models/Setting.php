<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'label', 'value'];

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}