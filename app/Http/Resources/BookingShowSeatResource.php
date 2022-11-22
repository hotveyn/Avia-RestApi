<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingShowSeatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "occupied_from" => $this->when(!is_null($this->place_from), [
                "passenger_id" => $this->id,
                "place" => $this->place_from
            ]),
            "occupied_back" => $this->when(!is_null($this->place_back), [
                "passenger_id" => $this->id,
                "place" => $this->place_back
            ]),
        ];
    }
}
