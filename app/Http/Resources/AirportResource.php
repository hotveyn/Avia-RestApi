<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'iata' => $this->iata,
        ];
    }
}
