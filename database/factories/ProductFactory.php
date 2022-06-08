<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_id = $this->faker->numberBetween(1,8);
        $subCategory = SubCategory::where('category_id', $category_id)->first();
        return [
            'category_id'=> $category_id,
            'sub_category_id'=> $subCategory->id,
            'product_name'=> $this->faker->text(rand(10,30)),
            'description'=> $this->faker->text(),
            'attributes'=>['sizes' => ['S', 'M', 'L'],'colors'=>['Red', 'Green', 'Blue']],
        ];
    }
}
