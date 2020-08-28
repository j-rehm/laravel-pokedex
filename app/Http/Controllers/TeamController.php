<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function toggle (Request $request) {
    // Update and retrieve session/pokemon information
    app(SessionController::class)->updateSession();
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      $trainer = $_SESSION['CurrentUser'];
    }
    
    // Get form values
    $id = (int) $request->input('id');
    $index = (int) $request->input('index');
    $parent = $request->input('parent');

    // Add/Remove pokemon from team
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

      // Update pokemon session storage
      app(SessionController::class)->updateSession();
    }

    // Route to calling page
    return redirect()->route($parent);
  }

}

?>