<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [

        'name',
        'iso3',
        'capital',
        'region',
        'currency',
        'language',
        'population',

        'latitude',
        'longitude',

        'flag',

        'risk_score',

        // Economy
        'gdp',
        'gdp_year',
        'gdp_growth'

    ];
}