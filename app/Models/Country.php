<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [

        'name',
        'capital',
        'region',
        'currency',
        'language',
        'population',

        'latitude',
        'longitude',

        'flag',

        'risk_score'

    ];
}