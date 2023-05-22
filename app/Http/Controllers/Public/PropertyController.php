<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PropertySearchResource;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Property $property, Request $request)
    {
        $property->load('apartments.facilities');
 
        if ($request->adults && $request->children) {
            $property->load(['apartments' => function ($query) use ($request) {
                $query->where('capacity_adults', '>=', $request->adults)
                    ->where('capacity_children', '>=', $request->children)
                    ->orderBy('capacity_adults')
                    ->orderBy('capacity_children');
            }, 'apartments.facilities']);
        }
 
        return new PropertySearchResource($property);
    }
}
