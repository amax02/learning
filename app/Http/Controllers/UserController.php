<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();

        return view('users.index', compact(['users']));
    }

    function create()
    {
        return view('users.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);

        return redirect('/users')->with('success', 'Data user berhasil ditambahkan.');
    }

    function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact(['user']));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        return redirect('/users')->with('success', 'Data user berhasil diubah.');
    }

    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Data user berhasil dihapus.');
    }
}
