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
    $pokemon = getPokemon();
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
function getPokemon () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
        $trainer = $_SESSION['CurrentUser'];
    }

    return DB::table('pokemon')
             ->whereIn('id', array(
                $trainer->pokemon[0],
                $trainer->pokemon[1],
                $trainer->pokemon[2],
                $trainer->pokemon[3],
                $trainer->pokemon[4],
                $trainer->pokemon[5],
             ))
             ->get();

    // foreach ($trainer->pokemon as $key => $id) {
    //     $p = DB::table('pokemon')
    //            ->where('id', '=', $id)
    //            ->get();
    //     array_push($pokemon, $p);
    // }
}