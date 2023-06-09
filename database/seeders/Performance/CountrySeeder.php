<?php

namespace Database\Seeders\Performance;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
 
class CountrySeeder extends Seeder
{
    public function run(int $count = 100): void
    {
        Country::factory($count)->create();
    }
}
