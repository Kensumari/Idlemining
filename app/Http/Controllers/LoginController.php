<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
    	if(auth()->attempt($request->only(['email', 'password']))) {
    		return redirect()->route('home')->withSuccess('You successfully logged in!');
    	}

    	return redirect()->route('home')->withError('Email or password is incorrect!')->withInfo('login');
    }
}
