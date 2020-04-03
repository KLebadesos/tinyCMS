<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //don't use ->get(); just use ->first();
        $user = User::where('email', 'admin@admin.com')->first();
        //dd($user);

        if(!$user){
            User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'role'      => 'admin',
            'password'  => Hash::make("admin1234")
            ]);
        }
    }
}
