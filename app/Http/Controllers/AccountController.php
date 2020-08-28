<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  // Handles sign up form submission
  public function SignUp (Request $request) {
    // Get form values
    $username = $request->input('username');
    $password = $request->input('password');
    $confirmPass = $request->input('confirmPass');

    // Get all existing trainers
    $trainers = DB::select('select * from trainers');

    // Reject information if trainer name is taken
    foreach ($trainers as $key => $value) {
      if($value->Username == $username){
        return redirect()->route('signup')
        ->with( ['error' => 'Account already exists'] );
      }
    }
    
    // Reject information if passwords do not match
    if ($password != $confirmPass) {
      return redirect()->route('signup')
      ->with( ['error' => 'Passwords do not match'] );
    }

    // Create trainer account and direct to login page
    DB::table('trainers')
        ->insert([
            ['username' => $username, 'password' => $password]
        ]);

    return redirect()->route('login');
  }

  // Handles login form submission
  public function Login (Request $request) {
    // Get form values
    $username = $request->input('username');
    $password = $request->input('password');

    // Gets the account from the database based on username AND password
    $account = DB::table('trainers')
                 ->where('Username', '=', $username)
                 ->where('Password', '=', $password)
                 ->get();

    // If the database returned a value, create a session object and send them to the pokemon page
    // Otherwise, display a message informing them of an error
    if (count($account) > 0) {
      app(SessionController::class)->setSession($username);
      return redirect()->route('pokemon');
    } else {
      return redirect()->route('login')
      ->with( ['error' => 'The username or password are incorrect'] );
    }
  }
}

?>