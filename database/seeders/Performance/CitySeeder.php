<?php

namespace Database\Seeders\Performance;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
 
class CitySeeder extends Seeder
{
    public function run(int $count = 100): void
    {
        City::factory($count)->create();
    }
}
