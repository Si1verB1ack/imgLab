<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->text(254),
            "price"=>fake()->randomFloat(2,5,10),
            "quantity_in_stock" => fake()->numberBetween(20,50),
            "categoryid"=>fake()->numberBetween(1,5),
        ];
    }
}
