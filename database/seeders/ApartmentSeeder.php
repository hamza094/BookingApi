<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apartment;
use App\Models\Facility;


use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appartments=Apartment::factory()->count(3)->create();

        $facility=Facility::first();

        foreach($appartments as $appartment){
            $appartment->facilities()->attach($facility->id);
        }
    }
}
