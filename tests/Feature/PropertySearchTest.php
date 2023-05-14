<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\City;
use App\Models\Country;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use App\Models\Geoobject;
use Tests\TestCase;

class PropertySearchTest extends TestCase
{
    use RefreshDatabase;

        public function test_property_search_by_city_return_correct_results(): void
      {
        $user = User::factory()->create()->assignRole(Role::ROLE_OWNER);

        $cities = City::take(2)->pluck('id');

        $propertyInCity = Property::factory()->create(['user_id' => $user->id, 'city_id' => $cities[0]]);

        $propertyInAnotherCity = Property::factory()->create(['user_id' => $user->id, 'city_id' => $cities[1]]);
 
        $response = $this->getJson('/api/search?city=' . $cities[0]);
 
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['id' => $propertyInCity->id]);
    }

    public function test_property_search_by_country_returns_correct_results(): void
{
    $user = User::factory()->create()->assignRole(Role::ROLE_OWNER);

    $countries = Country::with('cities')->take(2)->get();

    $propertyInCountry = Property::factory()->create([
        'user_id' => $user->id,
        'city_id' => $countries[0]->cities()->value('id')
    ]);

    $propertyInAnotherCountry = Property::factory()->create([
        'user_id' => $user->id,
        'city_id' => $countries[1]->cities()->value('id')
    ]);
 
    $response = $this->getJson('/api/search?country=' . $countries[0]->id);
 
    $response->assertStatus(200);
    $response->assertJsonCount(1);
    $response->assertJsonFragment(['id' => $propertyInCountry->id]);
}

  public function test_property_search_by_geoobject_returns_correct_results(): void
{
    $user = User::factory()->create()->assignRole(Role::ROLE_OWNER);

    $cityId = City::value('id');

    $geoobject = Geoobject::first();

    $propertyNear = Property::factory()->create([
        'user_id' => $user->id,
        'city_id' => $cityId,
        'lat' => $geoobject->lat,
        'long' => $geoobject->long,
    ]);

    $propertyFar = Property::factory()->create([
        'user_id' => $user->id,
        'city_id' => $cityId,
        'lat' => $geoobject->lat + 10,
        'long' => $geoobject->long - 10,
    ]);
 
    $response = $this->getJson('/api/search?geoobject=' . $geoobject->id);
 
    $response->assertStatus(200);
    $response->assertJsonCount(1);
    $response->assertJsonFragment(['id' => $propertyNear->id]);
}
}
