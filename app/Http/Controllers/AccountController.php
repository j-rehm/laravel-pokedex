<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  
  public function SignUp (Request $request) {
    $id = (int) $request->input('id');
    $team = (int) $request->input('team');
    $parent = $request->input('parent');

    $pokemon = DB::table('pokemon')
                 ->where('team', '=', 1)
                 ->get();
    $teamSize = count($pokemon);

    if ($team == 0) {
      if ($teamSize < 6) {
        DB::table('pokemon')
          ->where('Id', $id)
          ->update(['Team' => 1]);
      }
    } else {
      DB::table('pokemon')
        ->where('Id', $id)
        ->update(['Team' => 0]);
    }

    return redirect()->route($parent);
  }
}

?>