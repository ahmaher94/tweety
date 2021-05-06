<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{

    protected $model = Tweet::class;


    public function definition()
    {
        return [
            "user_id" => User::factory()->make(),
            "body" => $this->faker->sentence
        ];
    }
}
