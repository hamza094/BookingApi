<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Role;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->assignRole(Role::ROLE_OWNER),
            'name' => fake()->text(20),
            'city_id' => City::inRandomOrder()->value('id'),
            'address_street' => fake()->streetAddress(),
            'address_postcode' => fake()->postcode(),
            'lat' => fake()->latitude(),
            'long' => fake()->longitude(),
        ];
    }
}
