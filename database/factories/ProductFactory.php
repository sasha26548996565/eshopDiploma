<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'article' => $this->faker->unique()->word(),
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => random_int(10000, 10000000),
            'count' => mt_rand(1, 11),
            'properties' => [
                'height' => 25, 'Color' => 'White'
            ],
            'category_id' => Category::get()->random()->id,
            'collection_id' => Collection::get()->random()->id,
        ];
    }
}
