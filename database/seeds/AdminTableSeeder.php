<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        Admin::create(array(
            'email' => 'admin@store.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'Aymane',
            'is_super'=>1
        ));
    }
}
