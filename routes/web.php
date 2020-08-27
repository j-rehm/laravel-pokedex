<?php

use Illuminate\Support\Facades\Route;

// TEMP
Route::get('/temp', function () {
    return view('temp');
})->name('temp');

// INDEX
Route::get('/', function () {
    return view('index');
})->name('index');

// POKEMON
Route::get('/pokemon', function () {
    $pokemon = getAllPokemon();
    return view('pokemon', [
        'header' => 'Available Pokémon',
        'parent' => 'pokemon',
        'pokemon' => $pokemon
    ]);
})->name('pokemon');

// TEAM
Route::get('/team', function () {
    $pokemon = getTeamPokemon();
    return view('pokemon', [
        'header' => 'My Pokémon',
        'parent' => 'team',
        'pokemon' => $pokemon
    ]);
})
->name('team')
->middleware('checkAuth');
Route::post('/team', 'TeamController@toggle');

// SIGN UP
Route::get('/signup', function () {
    return view('signup', [
        'error' => null
    ]);
})->name('signup');
Route::post('/signup', 'AccountController@SignUp');

// LOG IN
Route::get('/login', function () {
    return view('login', [
        'error' => null
    ]);
})->name('login');
Route::post('/login', 'AccountController@Login');

// LOG OUT
Route::get('/logout', function () {
    unset($_SESSION['CurrentUser']);
    return redirect()->route('index');
})->name('logout');

// HELPER METHODS
function getAllPokemon () {
    $pokemonDB = DB::table('pokemon')->get();
    $pokemon = [];
    foreach ($pokemonDB as $key => $p) {
        array_push($pokemon, $p);
    }
    return $pokemon;
}

function getTeamPokemon () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
        $trainer = $_SESSION['CurrentUser'];
    }

    $pokemon = [];
    foreach ($trainer->pokemon as $key => $Id) {
        if (isset($Id)) {
            $p = DB::table('pokemon')
                   ->where('Id', '=', $Id)
                   ->get();
            array_push($pokemon, $p);
        }
    }
    return $pokemon;
}