<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['category_name'=>'Home & Garden']);
        Category::create(['category_name'=>'Entertainment']);
        Category::create(['category_name'=>'Clothing & Accessories']);
        Category::create(['category_name'=>'Family']);
        Category::create(['category_name'=>'Electronics']);
        Category::create(['category_name'=>'Hobbies']);
        Category::create(['category_name'=>'Classifieds']);
        Category::create(['category_name'=>'Vehicles']);
    }
}
