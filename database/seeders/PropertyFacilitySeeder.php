<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Property;
use App\Models\Facility;
use Illuminate\Database\Seeder;

class PropertyFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties=Property::all();

        $facilities = Facility::all();

        $properties->each(function ($property) use ($facilities) {
            $randomFacilities = $facilities->random(3)->pluck('id')->toArray();
            $property->facilities()->attach($randomFacilities);
        });
    }
}
