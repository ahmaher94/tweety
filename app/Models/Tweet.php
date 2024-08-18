<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\Likable;

class Tweet extends Model
{
    use HasFactory, likable;

    protected $fillable = ["user_id", "body"];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
