<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store']);

    Route::get('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

});

