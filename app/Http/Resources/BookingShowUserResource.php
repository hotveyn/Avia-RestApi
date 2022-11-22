<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingShowUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "items" => [
                BookingShowResource::make($this)
            ]
        ];
    }
}
