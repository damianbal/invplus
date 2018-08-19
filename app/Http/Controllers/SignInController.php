<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('auth.sign_in');
    }

    public function signOut()
    {
        Auth::logout();

        return back();
    }

    public function submit(SignInRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return back()->with('message', __('auth.signed_in'));
        }

        return back()->with('message', __('auth.could_not_sign_in'));
    }
}
