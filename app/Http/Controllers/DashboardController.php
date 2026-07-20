<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $country = null;

        if ($search) {

            $item = Country::where('name', 'LIKE', '%' . $search . '%')->first();
        
            if ($item) {
        
                $country = [
        
                    'name' => $item->name,
        
                    'flag' => $item->flag,
        
                    'capital' => $item->capital,
        
                    'region' => $item->region,
        
                    'population' => $item->population,
        
                    'currency' => $item->currency,
        
                    'language' => $item->language,
        
                    'latitude' => $item->latitude,
        
                    'longitude' => $item->longitude
        
                ];
        
            }
        
        }
        $news = [];

if ($search) {

    $responseNews = Http::get('https://gnews.io/api/v4/search', [

        'q' => $search . ' economy',

        'lang' => 'en',

        'max' => 3,

        'apikey' => env('GNEWS_API_KEY')

    ]);

    if ($responseNews->successful()) {

        $news = $responseNews->json()['articles'] ?? [];

    }

}

        // ===============================
        // REALTIME DATA DARI DATABASE
        // ===============================

        $totalCountries = Country::count();

        $totalCurrencies = Country::whereNotNull('currency')
            ->distinct()
            ->count('currency');

        $totalPopulation = Country::sum('population');

        $totalRegions = Country::whereNotNull('region')
            ->distinct()
            ->count('region');

            // ===============================
// WEATHER REALTIME
// ===============================

$weather = [
    'temperature' => '--'
];

if ($country) {

    $city = $country['capital'];

    $geo = Http::get("https://geocoding-api.open-meteo.com/v1/search", [
        'name' => $city,
        'count' => 1
    ]);

    if ($geo->successful() && isset($geo['results'][0])) {

        $lat = $geo['results'][0]['latitude'];
        $lon = $geo['results'][0]['longitude'];

        $weatherApi = Http::get("https://api.open-meteo.com/v1/forecast", [
            'latitude' => $lat,
            'longitude' => $lon,
            'current' => 'temperature_2m'
        ]);

        if ($weatherApi->successful()) {

            $weather['temperature'] =
                $weatherApi['current']['temperature_2m'];

        }

    }

}
// ===============================
// ECONOMY (SIMULASI REALTIME)
// ===============================

$economy = [
    'gdp' => rand(3,8).'%',
    'inflation' => rand(1,7).'%',
    'export' => rand(100,500).' B USD'
];

// ===============================
// PORT ACTIVITY
// ===============================

$ports = [

[
'name'=>'Singapore Port',
'status'=>'🟢 Normal',
'traffic'=>rand(70,100).'%'
],

[
'name'=>'Port Klang',
'status'=>'🟡 Busy',
'traffic'=>rand(60,90).'%'
],

[
'name'=>'Shanghai Port',
'status'=>'🔴 Congested',
'traffic'=>rand(85,100).'%'
]

];

// ===============================
// RISK SCORE
// ===============================

$risk = rand(20,95);
return view('dashboard', [

    'country'=>$country,
    
    'weather'=>$weather,
    
    'news'=>$news,
    
    'search'=>$search,
    
    'totalCountries'=>$totalCountries,
    
    'totalCurrencies'=>$totalCurrencies,
    
    'totalPopulation'=>$totalPopulation,
    
    'totalRegions'=>$totalRegions,
    
    'economy'=>$economy,
    
    'ports'=>$ports,
    
    'risk'=>$risk
    
    ]);

    }
}