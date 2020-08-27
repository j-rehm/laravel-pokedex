<?php

use Illuminate\Support\Facades\Route;

// INDEX
Route::get('/', function () {
    return view('index');
})->name('index');

// POKEMON
Route::get('/pokemon', function () {
    $pokemon = DB::table('pokemon')->get();
    return view('pokemon', [
        'header' => 'Available Pokémon',
        'parent' => 'pokemon',
        'pokemon' => $pokemon
    ]);
})->name('pokemon');

// TEAM
Route::get('/team', function () {
    $pokemon = DB::table('pokemon')
               ->where('team', '=', 1)
               ->get();
    return view('pokemon', [
        'header' => 'My Pokémon',
        'parent' => 'team',
        'pokemon' => $pokemon
    ]);
})->name('team');
Route::post('/team', 'TeamController@toggle');

// SIGN UP
Route::get('/signup', function () {
    return view('signup', [
        'error' => null,
        'accountMatch' => null
    ]);
})->name('signup');
Route::post('/signup', 'AccountController@SignUp');

// LOG IN
Route::get('/login', function () {
    $trainers = DB::table('trainers')
               ->get();
    return view('login', [
        'trainers' => $trainers
    ]);
})->name('login');