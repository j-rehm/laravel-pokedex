<?php

use Illuminate\Support\Facades\Route;

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
// must be logged in to access team page
->middleware('checkAuth');
// Form route - add/remove pokemon
Route::post('/team', 'TeamController@toggle');

// SIGN UP
Route::get('/signup', function () {
    return view('signup', [
        'error' => null
    ]);
})->name('signup');
// Form route - sign up
Route::post('/signup', 'AccountController@SignUp');

// LOG IN
Route::get('/login', function () {
    return view('login', [
        'error' => null
    ]);
})->name('login');
// Form route - log in
Route::post('/login', 'AccountController@Login');

// LOG OUT
Route::get('/logout', function () {
    unset($_SESSION['CurrentUser']);
    return redirect()->route('index');
})->name('logout');

// HELPER METHODS
// Get all pokemon from database
function getAllPokemon () {
    $pokemonDB = DB::table('pokemon')->get();
    $pokemon = [];
    foreach ($pokemonDB as $key => $p) {
        array_push($pokemon, $p);
    }
    return $pokemon;
}

// Get pokemon that belong to the trainer
function getTeamPokemon () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
        $trainer = $_SESSION['CurrentUser'];
    }

    // Join over TeamMembers and Pokemon to get trainer's pokemon team
    $pokemon = DB::table('TeamMembers')
                 ->where('TrainerId', '=', $trainer->id)
                 ->join('Pokemon', 'Pokemon.Id', '=', 'TeamMembers.PokemonId')
                 ->get();

    return $pokemon;
}