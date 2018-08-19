<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function __construct()
    {
        
    }

    public function show()
    {
        return view('auth.sign_in');
    }

    public function signOut()
    {
        Auth::logout();

        return redirect()->route('home')->with('message', __('auth.signed_out'));
    }

    public function submit(SignInRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('home')->with('message', __('auth.signed_in'));
        }

        return redirect()->route('home')->with('message', __('auth.could_not_sign_in'));
    }
}
