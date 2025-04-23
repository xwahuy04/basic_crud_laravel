<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user)
        {
            // jika membutuhkan semua data
            $users = User::all();
            // dd($users->toArray());
    
            // jika membutuhkan data filter
            // $users = User::get();
    
            return view('user-list' , compact('users'));
        } else {
            return redirect('/');
        }
        
    }

    public function store()
    {
        $users = new User();
        $users->name = 'User 2';
        $users-> email = 'user2@gmail.com';
        $users->password = 'password';
        $users->gender = 'laki-laki';
        $users->phone = 88888888;
        $users->addres = 'Lumajang';
        $users->is_active = 1;
        $users->save();
        dd($users);

    }

    public function update($id)
    {
        $users = User::where('id', $id)->first();
        $users->name = 'User';
        $users->gender = 'perempuan';
        $users->addres = 'Probolinggo';
        $users->password = 'password';
        $users->phone = 77777777;
        $users->is_active = 1;
        $users->save();


        dd('Sukses update');

    }

    public function delete($id)
    {
        $users = User::where('id', $id)->first();
        $users->delete();

        dd('sukses delete');
    }

    public function show($id)
    {

        if (Auth::user())
        {
            $user = User::where('id', $id)->first();
    
            dd($user->toArray());

        } else {
            return redirect('/');
        }
    }
}
