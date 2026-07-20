<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class ImportCountries extends Command
{
    protected $signature = 'countries:import';

    protected $description = 'Import all countries from REST Countries API';

    public function handle()
    {
        $this->info('Downloading countries...');

        $response = Http::timeout(60)
            ->get('https://restcountries.com/v3.1/all?fields=name,cca2,cca3,capital,region,subregion,population,flags');

        if (!$response->successful()) {
            $this->error('Failed to connect API');
            return;
        }

        $countries = $response->json();

        Country::truncate();

        foreach ($countries as $item) {

            Country::create([

                'name' => $item['name']['common'] ?? null,

                'code' => $item['cca2'] ?? null,

                'iso3' => $item['cca3'] ?? null,

                'capital' => $item['capital'][0] ?? null,

                'region' => $item['region'] ?? null,

                'subregion' => $item['subregion'] ?? null,

                'population' => $item['population'] ?? 0,

                'flag' => $item['flags']['png'] ?? null,

            ]);
        }

        $this->info('Import Finished!');
    }
}