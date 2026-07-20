<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EconomyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $country = null;
        $economy = null;
        $chartYears = [];
        $chartGDP = [];


        if ($search) {

            $country = Country::where('name', 'like', "%{$search}%")
                ->first();


            if ($country) {

                $economyData = Http::timeout(10)->get(
                    "https://api.worldbank.org/v2/country/{$country->iso3}/indicator/NY.GDP.MKTP.CD?format=json"
                )->json();


                if (isset($economyData[1])) {

                    $history = collect($economyData[1])
                        ->filter(function ($item) {
                            return $item['value'] != null;
                        })
                        ->take(10)
                        ->reverse();


                    foreach ($history as $item) {

                        $chartYears[] = $item['date'];

                        $chartGDP[] = round(
                            $item['value'] / 1000000000,
                            2
                        );

                    }


                    $latest = end($chartGDP);
                    $latestYear = end($chartYears);


                    $economy = [
                        'iso3' => $country->iso3,
                        'latest_gdp' => $latest,
                        'latest_year' => $latestYear
                    ];
                }

            }

        }


        return view('economy', compact(
            'country',
            'economy',
            'search',
            'chartYears',
            'chartGDP'
        ));
    }
}