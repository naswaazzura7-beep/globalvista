<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }



    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }



    public function update(Request $request, User $user)
    {

        $request->validate([
            'role' => 'required'
        ]);


        $user->update([
            'role' => $request->role
        ]);


        return redirect('/admin/users');

    }



    public function destroy(User $user)
    {

        $user->delete();

        return redirect('/admin/users');

    }


}