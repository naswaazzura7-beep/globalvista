<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $country = null;
        $weather = null;

        if ($search) {

            $country = Country::where('name', 'like', "%{$search}%")->first();

            if ($country && $country->latitude && $country->longitude) {

                try {

                    $response = Http::timeout(10)->get(
                        'https://api.open-meteo.com/v1/forecast',
                        [
                            'latitude' => $country->latitude,
                            'longitude' => $country->longitude,
                            'current' => 'temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code'
                        ]
                    );

                    if ($response->successful()) {
                        $weather = $response->json()['current'];
                    }

                } catch (\Exception $e) {

                    // API gagal, jangan sampai halaman error
                    $weather = null;

                }

            }

        }

        return view('weather', compact(
            'search',
            'country',
            'weather'
        ));
    }
}