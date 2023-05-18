<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        ];
    }
}
