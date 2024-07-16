<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FromUserController extends Controller
{
    public function create()
    {
        return view('Fromuser.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return redirect('/user/create')->with('success', 'User created successfully.');
    }
}
