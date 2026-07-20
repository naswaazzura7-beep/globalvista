<?php

namespace App\Http\Controllers;

use App\Models\Country;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Total Countries
        $totalCountries = Country::count();

        // Total Population
        $totalPopulation = Country::sum('population');

        // Total Ports
        $totalPorts = count(config('ports'));

        // High Risk Countries
        $highRisk = Country::where('risk_score', '>=', 70)->count();

        // Region Statistics
        $asia = Country::where('region', 'Asia')->count();
        $europe = Country::where('region', 'Europe')->count();
        $africa = Country::where('region', 'Africa')->count();
        $america = Country::where('region', 'Americas')->count();
        $oceania = Country::where('region', 'Oceania')->count();

        // Top 10 Population
        $topPopulation = Country::orderByDesc('population')
            ->take(10)
            ->get();

        // Top Risk Countries
        $topRisk = Country::orderByDesc('risk_score')
            ->take(10)
            ->get();

        return view('analytics', compact(
            'totalCountries',
            'totalPopulation',
            'totalPorts',
            'highRisk',
            'asia',
            'europe',
            'africa',
            'america',
            'oceania',
            'topPopulation',
            'topRisk'
        ));
    }
}