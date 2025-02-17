<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }
    public function welcome(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        return view('pages.welcome', compact('firstName', 'lastName'));
    }

}
