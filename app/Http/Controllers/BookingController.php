<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Http\Resources\BookingShowResource;
use App\Http\Resources\BookingShowSeatResource;
use App\Http\Resources\PassengersResources;
use App\Models\Booking;
use App\Models\Passenger;
use App\Services\ResponseService;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function store(BookingStoreRequest $request)
//    {
//        return response($request->validated());
//    }

    public function info(Booking $code)
    {
        return ResponseService::success(BookingShowResource::make($code));
    }

    function isSeatedResponse()
    {
        return response([
            "error" => [
                "code" => 422,
                "message" => "Seat is occupied"
            ]
        ], 422);
    }

    public function update(BookingUpdateRequest $request, Booking $code)
    {
        $passenger = $code->passengers->where("id", $request->passenger)->first();
        if (is_null($passenger)) {
            return response([
                "error" => [
                    "code" => 403,
                    "message" => "Passenger does not apply to booking"
                ]
            ], 403);
        }

        // todo: Вынести в модель
        if ($request->type === "from") {
            // Проверка занято ли место
            $isOcuppied = !is_null($code->passengers->where("place_from", $request->seat)->first());
            if($isOcuppied) return $this->isSeatedResponse($isOcuppied);

            $passenger->update(["place_from" => strtoupper($request->seat)]);
            return ResponseService::success(PassengersResources::make($passenger));

        } else if ($request->type === "back") {
            // Проверка занято ли место
            $isOcuppied = !is_null($code->passengers->where("place_back", $request->seat)->first());
            if($isOcuppied) return $this->isSeatedResponse($isOcuppied);

            $passenger->update(["place_back" => strtoupper($request->seat)]);
            return ResponseService::success(PassengersResources::make($passenger));
        }
    }


    public function infoSeat(Booking $code)
    {

//        return response($code->passengers);
        return BookingShowSeatResource::collection($code->passengers);
    }
}
