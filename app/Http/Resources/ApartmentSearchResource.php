<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FacilityResource;


class ApartmentSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           'name' => $this->name,
           'type' => $this->apartment_type?->name,
           'size' => $this->size,
           'beds_list' => $this->beds_list,
           'bathrooms' => $this->bathrooms,
           'facilities' => FacilityResource::collection($this->whenLoaded('facilities')),
            'price' => $this->calculatePriceForDates($request->start_date, $request->end_date)
        ];
        
    }
}
