<?php

use Illuminate\Support\Facades\Route;

// INDEX
Route::get('/', function () {
    return view('index');
});

Route::get('/pokemon', function () {
    $pokemon = DB::table('pokemon')->get();
    return view('pokemon', [
        'header' => 'Available Pokémon',
        'parent' => 'pokemon',
        'pokemon' => $pokemon
    ]);
})->name('pokemon');

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

Route::get('/signup', function () {
    return view('signup', [
        'error' => null
    ]);
})->name('signup');
Route::post('/signup', 'AccountController@SignUp');

Route::get('/login', function () {
    return view('login', [
        'error' => null
    ]);
})->name('login');
Route::post('/login', 'AccountController@Login');