<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * @param \App\Http\Requests\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            return redirect()->route('home')->with('success', 'You successfully logged in!');
        }

        return redirect()->route('home')->with('error', 'Email or password is incorrect!')->with('info', 'login');
    }
}
