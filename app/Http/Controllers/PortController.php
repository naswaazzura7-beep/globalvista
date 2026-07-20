<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? 'Indonesia';

        $country = Country::where('name', 'like', "%{$search}%")->first();

        $ports = [];

        if ($country) {

            $ports = config('ports.' . $country->name, []);

        }

        return view('ports', [
            'country' => $country,
            'ports' => $ports,
            'search' => $search,
        ]);
    }
}