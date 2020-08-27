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
      $trainer->pokemon = DB::table('TeamMembers')
                            ->where('TrainerId', '=', $trainer->id)
                            ->join('Pokemon', 'Pokemon.Id', '=', 'TeamMembers.PokemonId')
                            ->get();
    }

    $_SESSION['CurrentUser'] = $trainer;
  }
  
  public function updateSession () {
    $this->setSession($_SESSION['CurrentUser']->name);
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