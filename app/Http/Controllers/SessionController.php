<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
  public function setSession ($username) {
    $trainerDB = DB::table('trainers')
                   ->where('Username', '=', $username)
                   ->get();
    $trainer = (object)[];
    
    foreach ($trainerDB as $key => $t) {
      $trainer->id = $t->Id;
      $trainer->name = $t->Username;
      $pokemon = [];
      for ($i = 1; $i <= 6; $i++) {
        $p = $t->{'Pokemon' . $i . 'ID'};
        if (isset($p)) {
          array_push($pokemon, $p);
        }
      }
      $trainer->pokemon = $pokemon;
    }

    $_SESSION['CurrentUser'] = $trainer;
  }
  
  public function updateSession () {
    setSession($_SESSION['CurrentUser']->name);
  }

  public function unsetSession () {
    unset($_SESSION['CurrentUser']);
  }

  public function getTrainer () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      return $_SESSION['CurrentUser'];
    }
    return null;
  }
}

?>