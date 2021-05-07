<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{

    public function index()
    {
        $tweets = Tweet::latest()->get();
        return view('tweets.index', [
            "tweets" => auth()->user()->timeline()
        ]);
    }


    public function store(Request $request){

        $attributes = $request->validate(["body" => "required|max:255"]);
        
        Tweet::create([
            "user_id" => auth()->id(),
            "body" => $attributes["body"]
        ]);

        return redirect()->route('home');
    }
}
