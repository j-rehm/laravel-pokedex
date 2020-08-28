<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
  // Gets pokemon data from database and sets it to a session object
  public function setSession ($username) {
    $trainerDB = DB::table('trainers')
                   ->where('Username', '=', $username)
                   ->get();
    $trainer = (object)[];
    
    // Iterate once, get pokemon from TeamMemebrs join
    foreach ($trainerDB as $key => $t) {
      $trainer->id = $t->Id;
      $trainer->name = $t->Username;
      $trainer->pokemon = DB::table('TeamMembers')
                            ->where('TrainerId', '=', $trainer->id)
                            ->join('Pokemon', 'Pokemon.Id', '=', 'TeamMembers.PokemonId')
                            ->get();
    }

    // Set object to session
    $_SESSION['CurrentUser'] = $trainer;
  }
  
  // Re-sets the session using current trainer name
  public function updateSession () {
    $this->setSession($_SESSION['CurrentUser']->name);
  }

  // Removes the session object
  public function unsetSession () {
    unset($_SESSION['CurrentUser']);
  }

  // Get trainer object from session
  public function getTrainer () {
    if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
      return $_SESSION['CurrentUser'];
    }
    return null;
  }
}

?>