<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Country;

class FillIso3 extends Command
{
    protected $signature = 'fill:iso3';
    protected $description = 'Fill ISO3 code from local countries.json';

    public function handle()
    {
        $json = file_get_contents(storage_path('app/countries.json'));

        $countries = json_decode($json, true);

        foreach ($countries as $country) {

            $name = $country['name']['common'] ?? null;
            $iso3 = $country['cca3'] ?? null;

            if (!$name || !$iso3) {
                continue;
            }

            Country::where('name', $name)
                ->update([
                    'iso3' => $iso3
                ]);
        }

        $this->info('✅ ISO3 berhasil diisi dari countries.json');
    }
}