<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  
  public function SignUp (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    $confirmPass = $request->input('confirmPass');

    if ($password == $confirmPass) {
        DB::table('trainer')
            ->insert([
                ['username' => $username, 'password' => $password]
            ]);
    
        return redirect()->route('login');
    } else {
        return redirect()->route('signup')
        ->with( ['error' => 'Passwords do not match.'] );
    }
  }

}


?>