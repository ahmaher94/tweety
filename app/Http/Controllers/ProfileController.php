<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user){
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }
}
