<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'fullUrl',
        'shortUrl',
        'tag',
    ];
}
