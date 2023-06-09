<?php

namespace Database\Seeders\Performance;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Geoobject;
 
class GeoobjectSeeder extends Seeder
{
    public function run(int $count = 100): void
    {
        Geoobject::factory($count)->create();
    }
}
