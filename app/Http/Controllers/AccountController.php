<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  
  public function SignUp (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    $confirmPass = $request->input('confirmPass');

    $trainers = DB::select('select * from trainers');

    foreach ($trainers as $key => $value) {
      if($value->Username == $username){
        return redirect()->route('signup')
        ->with( ['error' => 'Account already exists!'] );
      }
    }

    if ($password == $confirmPass) {
        DB::table('trainers')
            ->insert([
                ['username' => $username, 'password' => $password]
            ]);
    
        return redirect()->route('login');
    } else {
        return redirect()->route('signup')
        ->with( ['error' => 'Passwords do not match.'] );
    }
  }

  public function Login (Request $request) {
    $username = $request->input('username');

    $trainers = DB::table('trainers')->get();

    $exists = false; 
    foreach ($trainers as $key => $value) {
      if($value->Username == $username){
        $exists = true;
      }
    }

    if($exists){
      $_SESSION['CurrentUser'] = $username;
      return redirect()->route('pokemon');
    } else {
      return redirect()->route('login')
      ->with( ['error' => 'The account does not exist.'] );
    }
  }
}

?>