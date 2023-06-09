<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
 
class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'country_id' => Country::inRandomOrder()->value('id'),
            'name' => fake()->name(),
            'lat' => fake()->latitude(),
            'long' => fake()->longitude(),
        ];
    }
}
