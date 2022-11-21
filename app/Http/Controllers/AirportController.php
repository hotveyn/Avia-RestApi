<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportSearchRequest;
use App\Http\Resources\AirportResource;
use App\Models\Airport;
use App\Services\ResponseService;

class AirportController extends Controller
{
    public function search(AirportSearchRequest $request)
    {
        $query = '%'.strtolower($request->query('query')).'%';
        $airports = Airport::where("name", "like", $query)
            ->orWhere("iata", "like", $query)
            ->orWhere("city", "like", $query)->get();
        return ResponseService::success(["items" => AirportResource::collection($airports)]);
    }
}
