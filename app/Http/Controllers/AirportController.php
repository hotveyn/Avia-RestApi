<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportSearchRequest;
use App\Http\Resources\AirportResource;
use App\Models\Airport;
use App\Services\ResponseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class AirportController extends Controller
{
    public function search(AirportSearchRequest $request): Response|Application|ResponseFactory
    {
        $query = '%' . strtolower($request->query('query')) . '%';
        $airports = Airport::where("name", "like", $query)
            ->orWhere("iata", "like", $query)
            ->orWhere("city", "like", $query)->get();
        return ResponseService::success(["items" => AirportResource::collection($airports)]);
    }
}
