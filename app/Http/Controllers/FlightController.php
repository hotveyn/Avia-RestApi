<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearchRequest;
use App\Http\Resources\FlightResource;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use Illuminate\Http\Response;
use function PHPUnit\Framework\isNull;

class FlightController extends Controller
{
    /**
     *
     * @param FlightSearchRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function search(FlightSearchRequest $request): Response|Application|ResponseFactory
    {
        //todo: Вынести логику в модель Flight
        $airportsFrom = Airport::where("iata", $request->from)->first();
        $airportsTo = Airport::where("iata", $request->to)->first();

        $flightsTo = Flight::where("from_id", $airportsFrom->id)
            ->where("to_id", $airportsTo->id)->get();
        $flightsFrom = Flight::where("to_id", $airportsFrom->id)
            ->where("from_id", $airportsTo->id)->get();


        if ($request->missing("date2")) {
            return response(["data" => [
                "flight_to" => FlightResource::collection($flightsTo)
            ]]);
        } else {
            return response(["data" => [
                "flight_to" => FlightResource::collection($flightsTo),
                "flight_back" => FlightResource::collection($flightsFrom),
            ]]);
        }
    }
}
