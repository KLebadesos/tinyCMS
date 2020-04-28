<?php

namespace App\Http\Controllers;
use App\Http\Requests\Users\UpdateProfileRequest;

use App\User;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }

    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }

    public function update(UpdateProfileRequest $request){
      $user = auth()->user();
        //dd($user->all());
      $user->update([
        'name'  => $request->name,
        'about' => $request->about,
      ]);
    
      session()->flash('success','Has been successfully updated');

      return redirect(route('users.index'));

    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','Has been successfully make admin');
        return redirect(route('users.index'));
    }
}
