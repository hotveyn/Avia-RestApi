<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearchRequest;
use App\Http\Resources\FlightResource;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use function PHPUnit\Framework\isNull;

class FlightController extends Controller
{
    public function search(FlightSearchRequest $request)
    {
        //todo: Вынести логику в модель Flight
        $airportsFrom = Airport::where("iata", $request->from)->get()->first();
        $airportsTo = Airport::where("iata", $request->to)->get()->first();
//      $airportsFrom = Airport::where("iata", $request->from)->get()[0];
//      $airportsTo = Airport::where("iata", $request->to)->get()[0];

        $flightsTo = Flight::where("from_id", $airportsFrom->id)
            ->where("to_id", $airportsTo->id)->get();
        $flightsFrom = Flight::where("to_id", $airportsFrom->id)
            ->where("from_id", $airportsTo->id)->get();

        // Скорее всего есть функция которая проверяет передан ли параметр
        // но я его не нашёл, поэтому использую вот такой способ/костыль
        if ($request->missing("date2")) {
            return response(["data"=>[
                "flight_to"=>FlightResource::collection($flightsTo)
            ]]);
        }else{
            return response(["data"=>[
                "flight_to"=>FlightResource::collection($flightsTo),
                "flight_back"=>FlightResource::collection($flightsFrom),
            ]]);
        }
    }
}
