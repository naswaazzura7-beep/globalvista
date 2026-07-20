<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AdminCountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();

        return view('admin.countries', compact('countries'));
    }


    public function create()
    {
        return view('admin.create-country');
    }


    public function store(Request $request)
{
    $country = Country::create([
        'name' => $request->name,
        'capital' => $request->capital,
        'region' => $request->region,
    ]);

    return redirect('/admin/countries');
}


    public function edit(Country $country)
    {
        return view('admin.edit-country', compact('country'));
    }


    public function update(Request $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('countries.admin');
    }


    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.admin');
    }

}