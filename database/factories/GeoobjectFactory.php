<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
 
class GeoobjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'city_id' => City::inRandomOrder()->value('id'),
            'name' => fake()->name(),
            'lat' => fake()->latitude(),
            'long' => fake()->longitude(),
        ];
    }
}
