<?php

namespace Database\Seeders\Performance;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $users = User::where()->assignRole(Role::ROLE_OWNER)->pluck('id');
        $cities = City::pluck('id');
 
        for ($i = 1; $i <= $count; $i++) {
            Property::factory()->create([
                'user_id' => $users->random(),
                'city_id' => $cities->random(),
            ]);
        }
    }
}
