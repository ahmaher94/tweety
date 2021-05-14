<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user){
        return view('profiles.show', [
            'user'=>$user,
            'tweets'=>$user->tweets()->paginate(20)
        ]);
    }

    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $attributes = $request->validate([
            "username" => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
            "name" => ['string', 'required', 'max:255'],
            "avatar" => ['file'],
            "email" => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            "password" => ['string', 'required', 'confirmed', 'min:8', 'max:255'],
            ]);

            // if($request->avatar){
            //     $attributes['avatar'] = $request->avatar->store('avatars');
            // }
            if ($request->hasFile('avatar')) {
                $filenameWithExt = $request->file('avatar')->getClientOriginalName ();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename. '_'. time().'.'.$extension;
                // Upload Image
                $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
                }
                // Else add a dummy image
                else {
                $fileNameToStore = 'default.jpg';
                }
            
            $attributes['avatar'] = $fileNameToStore;

            $user->update($attributes);

            return redirect($user->path());
    }


}
