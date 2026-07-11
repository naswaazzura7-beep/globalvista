<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $countries = Country::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('capital', 'like', "%{$search}%")
                  ->orWhere('region', 'like', "%{$search}%")
                  ->orWhere('currency', 'like', "%{$search}%");
        })
        ->orderBy('name')
        ->paginate(15);

        return view('countries', compact('countries', 'search'));
    }
}