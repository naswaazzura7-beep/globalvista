<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::truncate();

        $json = file_get_contents(storage_path('app/countries.json'));
        $countries = json_decode($json, true);

        foreach ($countries as $country) {

            Country::create([
                'name' => $country['name']['common'] ?? '',
                'capital' => $country['capital'][0] ?? '',
                'region' => $country['region'] ?? '',
                'currency' => isset($country['currencies'])
                    ? array_key_first($country['currencies'])
                    : '',
                'language' => isset($country['languages'])
                    ? implode(', ', $country['languages'])
                    : '',
                'population' => rand(500000, 300000000),

                // INI YANG BENAR
                'flag' => isset($country['cca2'])
    ? 'https://flagcdn.com/w80/' . strtolower($country['cca2']) . '.png'
    : '',

                'risk_score' => rand(1, 100),
            ]);

        }
    }
}