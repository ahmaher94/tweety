<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline(){
        $freinds = $this->follows()->pluck('users.id');
        return Tweet::whereIn('user_id', $freinds)
                      ->orWhere("user_id", auth()->user()->id)
                      ->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute(){
        return "https://i.pravatar.cc/200?u=".$this->email;
    }

    // public function getRouteKeyName(){
    //     return 'name';
    // }

    public function path($append = ""){
        $path = route('profile', $this->name);
        return $append ? "{$path}/{$append}" : $path;
    }
}
