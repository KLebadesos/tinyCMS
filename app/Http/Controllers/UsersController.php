<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','Has been successfully make admin');
        return redirect(route('users.index'));
    }
}
