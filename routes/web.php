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
    return view('signup');
});
Route::post('/signup', 'AccountController@SignUp');
Route::get('/login', function () {
    $trainer = DB::table('trainer')
               ->get();
    return view('login', [
        'trainer' => $trainer
    ]);
})->name('login');