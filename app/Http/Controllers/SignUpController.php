<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function __construct() {
        $this->middleware('guest');       
    }

    public function show()
    {
        return view('auth.sign_up');
    }
    
    public function submit(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required|min:4|unique:users',
            'name' => 'min:3|required',
            'password' => 'min:4|required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return back()->with('message', __('common.account_created').'!');
    }
}
