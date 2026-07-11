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

        $countries = Country::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->orderBy('name')
        ->paginate(15);

        return view('weather', compact('countries', 'search'));
    }
}