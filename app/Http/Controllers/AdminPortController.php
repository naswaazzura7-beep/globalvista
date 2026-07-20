<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class AdminPortController extends Controller
{

    public function index()
    {
        $ports = Port::all();

        return view('admin.ports', compact('ports'));
    }


    public function create()
    {
        return view('admin.create-port');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);


        Port::create([

            'name' => $request->name,
            'country' => $request->country,
            'city' => $request->city,
            'type' => $request->type,
            'capacity' => $request->capacity,

        ]);


        return redirect('/admin/ports');

    }



    public function edit(Port $port)
    {
        return view('admin.edit-port', compact('port'));
    }



    public function update(Request $request, Port $port)
    {

        $port->update([

            'name' => $request->name,
            'country' => $request->country,
            'city' => $request->city,
            'type' => $request->type,
            'capacity' => $request->capacity,

        ]);


        return redirect('/admin/ports');

    }




    public function destroy(Port $port)
    {

        $port->delete();

        return redirect('/admin/ports');

    }

}