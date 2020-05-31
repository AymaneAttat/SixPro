<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
  
        Category::create(array(
            'description' => 'This is women',
            'name' => 'Women',
            'status'=>1
        ));
        
        Category::create(array(
            'description' => 'This is men',
            'name' => 'Men',
            'status'=>1
        ));

        Category::create(array(
            'description' => 'This is cloths',
            'name' => 'Cloths',
            'status'=>1
        ));

        Category::create(array(
            'description' => 'This is sports',
            'name' => 'Sports',
            'status'=>1
        ));
        Category::create(array(
            'description' => 'This is laptop',
            'name' => 'Laptop',
            'status'=>1
        ));

        Category::create(array(
            'description' => 'This is electronics',
            'name' => 'Electronics',
            'status'=>1
        ));

        Category::create(array(
            'description' => 'This is furniture',
            'name' => 'Furniture',
            'status'=>1
        ));

        Category::create(array(
            'description' => 'This is others',
            'name' => 'Others',
            'status'=>1
        ));
    }
}
