<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
  
        User::create(array(
            'email' => 'member@email.com',
            'password' => Hash::make('password'),
            'name' => 'hicham',
            'admin'=>0
        ));
        
        User::create(array(
            'email' => 'admin@store.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'Aymane',
            'admin'=>1
        ));

    }
}