<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;

class PropertyController extends Controller
{
    public function index()
    {
        $this->authorize('properties-manage');

        // Will implement property management later
        return response()->json(['success' => true]);
    }

    public function store(StorePropertyRequest $request)
    {
        $this->authorize('properties-manage');
 
        return auth()->user()->properties()->create($request->validated());
    }
}
