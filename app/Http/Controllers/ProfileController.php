<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user){
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $attributes = $request->validate([
            "username" => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
            "name" => ['string', 'required', 'max:255'],
            "avatar" => ['file', 'required'],
            "email" => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            "password" => ['string', 'required', 'confirmed', 'min:8', 'max:255'],
            ]);

            $attributes['avatar'] = $request->avatar->store('public/avatars');
            $user->update($attributes);

            return redirect($user->path());
    }


}
