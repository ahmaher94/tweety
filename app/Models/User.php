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
        'username',
        'avatar',
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
                      ->latest()->paginate(20);
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute($value){
        if($value){
        return asset('storage/avatars/'.$value);
        }
        return asset('storage/avatars/default.png');
    }

    // public function getRouteKeyName(){
    //     return 'name';
    // }

    public function path($append = ""){
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function setPasswordAttribute($value){
        return $this->attributes['password'] = bcrypt($value);
    }
}
