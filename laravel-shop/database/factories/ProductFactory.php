<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id',
            'name',
            'slug',
            'brand',
            'small_description',
            'description',
            'original_price',
            'selling_price',
            'quantity',
            'trending',
            'status',
            'meta_title',
            'meta_keyword',
            'meta_description',
        ];
    }
}
