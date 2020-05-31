<?php

use Illuminate\Database\Seeder;
use App\Manufacture;

class ManufacuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactures')->delete();
  
        Manufacture::create(array(
            'description' => 'This is samsung brand',
            'name' => 'Samsung',
            'status'=>1
        ));
        
        Manufacture::create(array(
            'description' => 'Zara pents',
            'name' => 'Zara',
            'status'=>1
        ));

        Manufacture::create(array(
            'description' => 'oboti furniture',
            'name' => 'Oboti',
            'status'=>1
        ));

        Manufacture::create(array(
            'description' => 'apple brand',
            'name' => 'Apple',
            'status'=>1
        ));

        Manufacture::create(array(
            'description' => 'adiddas',
            'name' => 'Adiddas',
            'status'=>1
        ));

        Manufacture::create(array(
            'description' => 'This is others',
            'name' => 'Others',
            'status'=>1
        ));
    }
}
