<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create(['category_id'=> 1, 'sub_category_name'=>'Tools']);
        SubCategory::create(['category_id'=> 1, 'sub_category_name'=>'Furniture']);
        SubCategory::create(['category_id'=> 1, 'sub_category_name'=>'Household']);
        SubCategory::create(['category_id'=> 1, 'sub_category_name'=>'Garden']);
        SubCategory::create(['category_id'=> 1, 'sub_category_name'=>'Appliances']);

        SubCategory::create(['category_id'=> 2, 'sub_category_name'=>'Video Games']);
        SubCategory::create(['category_id'=> 2, 'sub_category_name'=>'Books, Movies & Music']);

        SubCategory::create(['category_id'=> 3, 'sub_category_name'=>'Bags & Luggage']);
        SubCategory::create(['category_id'=> 3, 'sub_category_name'=>"Women's clothing & shoes"]);
        SubCategory::create(['category_id'=> 3, 'sub_category_name'=>"Men's clothing & shoes"]);
        SubCategory::create(['category_id'=> 3, 'sub_category_name'=>"Jewelry & Accessories"]);

        SubCategory::create(['category_id'=> 4, 'sub_category_name'=>"Health & beauty"]);
        SubCategory::create(['category_id'=> 4, 'sub_category_name'=>"Pet Supplies"]);
        SubCategory::create(['category_id'=> 4, 'sub_category_name'=>"Baby & kids"]);
        SubCategory::create(['category_id'=> 4, 'sub_category_name'=>"Toys & Games"]);

        SubCategory::create(['category_id'=> 5, 'sub_category_name'=>"Electronics & computers"]);
        SubCategory::create(['category_id'=> 5, 'sub_category_name'=>"Mobile phones"]);

        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Bicycles"]);
        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Arts & Crafts"]);
        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Sports & Outdoors"]);
        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Auto parts"]);
        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Musical Instruments"]);
        SubCategory::create(['category_id'=> 6, 'sub_category_name'=>"Antiques & Collectibles"]);

        SubCategory::create(['category_id'=> 7, 'sub_category_name'=>"Garage Sale"]);
        SubCategory::create(['category_id'=> 7, 'sub_category_name'=>"Miscellaneous"]);

        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Car/Truck"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Motorcycle"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Powersport"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"RV/Camper"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Trailer"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Boat"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Commercial/Industrial"]);
        SubCategory::create(['category_id'=> 8, 'sub_category_name'=>"Other"]);

    }
}
