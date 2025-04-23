<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     public function login(Request $request)
     {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        
        if($user)
        {
            $hashedPassword = $user->password;
            if (Hash::check($password, $hashedPassword)) {
               dd('sukses login');
            } else {
                dd('Password Not Match');

            }
        } else {
            dd('User not found');
        }
     }
}
