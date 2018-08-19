<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;

class UserService
{
    protected $user;

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function handleLogoUpload(Request $request)
    {
        if(!$this->user) return;

        if($request->has('logo')) 
        {
            $path = $request->logo->store('profile_logos');

            $this->user->update(['logo' => $path]);
        }
    }
}
