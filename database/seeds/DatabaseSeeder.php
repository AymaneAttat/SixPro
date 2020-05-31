<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Eloquent::unguard();
        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');
        $this->call('CategoriesTableSeeder');
        $this->command->info('Categories table seeded!');
        $this->call('ManufacuresTableSeeder');
        $this->command->info('Manufactures table seeded!');
        $this->call('AdminTableSeeder');
        $this->command->info('Admins table seeded!');
    }
}
