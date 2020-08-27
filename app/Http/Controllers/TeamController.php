<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function toggle (Request $request) {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      $trainer = $_SESSION['CurrentUser'];
    }
    
    $id = (int) $request->input('id');
    $parent = $request->input('parent');

    $teamSize = count($trainer->pokemon);

    if ($teamSize < 6) {
      $nextPokemon = 'Pokemon' . ($teamSize + 1) . 'ID';
      DB::table('trainers')
        ->where('username', '=', $username)
        ->update([$nextPokemon => $id]);
    }
    app(SessionController::class)->updateSession();
    
    // foreach ($trainer->pokemon as $key => $p) {
    //   echo ($p? $p : 'NULL');
    //   echo ('<br />');
    // }

    return redirect()->route($parent);
  }


    // if ($team == 0) {
    //   if ($teamSize < 6) {
    //     DB::table('pokemon')
    //       ->where('Id', $id)
    //       ->update(['Team' => 1]);
    //   }
    // } else {
    //   DB::table('pokemon')
    //     ->where('Id', $id)
    //     ->update(['Team' => 0]);
    // }

}

?>