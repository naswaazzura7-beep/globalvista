<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $response = Http::get('https://open.er-api.com/v6/latest/USD');

        $rates = [];

        if ($response->successful()) {
            $rates = $response->json()['rates'];
        }

        $countries = Country::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('currency', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(15);

        return view('currency', compact('countries','rates','search'));
    }
}