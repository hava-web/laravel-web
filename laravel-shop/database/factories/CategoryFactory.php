<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ 
    public function definition()
    {
        return [
        'name' => $this->faker->name,
        'slug' => $this->faker->text,
        'description' => $this->faker->text,
        'image' => $this->faker->image,
        'meta_title' => $this->faker->text,
        'meta_keyword' => $this->faker->text,
        'meta_description' => $this->faker->text,
        ];
    }
}
