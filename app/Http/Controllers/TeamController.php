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
    $index = (int) $request->input('index');
    $parent = $request->input('parent');

    if ($parent == 'team') { // Remove pokemon from $trainer team
      DB::table('TeamMembers')
        ->where('TrainerId', '=', $trainer->id)
        ->where('PokemonId', '=', $id)
        ->limit(1)
        ->delete();

      app(SessionController::class)->updateSession();
    } else { // Add pokemon to $trainer team
      if (count($trainer->pokemon) < 6) {
        DB::table('TeamMembers')
          ->insert([
            'TrainerId' => $trainer->id,
            'PokemonId' => $id
          ]);
      }

      app(SessionController::class)->updateSession();
    }

    return redirect()->route($parent);
  }

}

?>