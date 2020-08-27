<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function toggle (Request $request) {
    app(SessionController::class)->updateSession();
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      $trainer = $_SESSION['CurrentUser'];
    }
    
    $id = (int) $request->input('id');
    $index = (int) $request->input('index'); // 3
    $parent = $request->input('parent');

    if ($parent == 'team') { // Remove pokemon from $trainer team
      $removePokemon = 'Pokemon' . $index . 'ID'; // Pokemon3ID
      DB::table('trainers')
        ->where('username', '=', $trainer->name)
        ->update([$removePokemon => null]);
      app(SessionController::class)->updateSession();
      $this->compact();
    } else { // Add pokemon to $trainer team
      $teamSize = count($trainer->pokemon);
  
      if ($teamSize < 6) {
        $nextPokemon = 'Pokemon' . ($teamSize + 1) . 'ID';
        DB::table('trainers')
          ->where('username', '=', $trainer->name)
          ->update([$nextPokemon => $id]);
      }
      app(SessionController::class)->updateSession();
    }

    return redirect()->route($parent);
  }

  private function compact () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      $trainer = $_SESSION['CurrentUser'];
    }
    var_dump($trainer->pokemon);
    echo('<br />');

    $pokemonIds = [];
    foreach ($trainer->pokemon as $key => $id) {
      if (isset($id)) {
        array_push($pokemonIds, $id);
      }
    }

    for ($i = 1; $i <= 6; $i++) {
      $val = isset($pokemonIds[$i - 1])? $pokemonIds[$i - 1] : null;
      $nextPokemon = 'Pokemon' . $i . 'ID';
      echo($nextPokemon . ': ' . ($val? $val : 'NULL') . '<br />');
      DB::table('trainers')
        ->where('username', '=', $trainer->name)
        ->update([$nextPokemon => $val]);
    }
    app(SessionController::class)->updateSession();
  }

}

?>