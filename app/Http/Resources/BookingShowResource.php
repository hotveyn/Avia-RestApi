<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingShowResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "code" => $this->code,
            "cost" => 40000,
            "flights" => [
                FlightResource::make($this->flightFrom),
                FlightResource::make($this->flightBack),
            ],
            "passengers" => PassengersResources::collection($this->passengers)
        ];
    }
}
