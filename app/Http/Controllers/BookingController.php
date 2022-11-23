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
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BookingController extends Controller
{

    /**
     * @param Booking $code
     * @return Response
     */
    public function info(Booking $code): Response
    {
        return ResponseService::success(BookingShowResource::make($code));
    }

    /**
     * @param BookingUpdateRequest $request
     * @param Booking $code
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response|void
     */
    public function update(BookingUpdateRequest $request, Booking $code)
    {
        $passenger = $code->passengers()->where("id", $request->passenger)->first();
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
            if ($code->passengers()->where("place_from", $request->seat)->exists())
                return ResponseService::error("Seat is occupied", 422);

            $passenger->update(["place_from" => strtoupper($request->seat)]);
            return ResponseService::success(PassengersResources::make($passenger));

        } else if ($request->type === "back") {
            // Проверка занято ли место
            if ($code->passengers()->where("place_back", $request->seat)->exists())
                return ResponseService::error("Seat is occupied", 422);

            $passenger->update(["place_back" => strtoupper($request->seat)]);
            return ResponseService::success(PassengersResources::make($passenger));
        }
    }


    /**
     * @param Booking $code
     * @return AnonymousResourceCollection
     */
    public function infoSeat(Booking $code): AnonymousResourceCollection
    {
        return BookingShowSeatResource::collection($code->passengers()->get());
    }
}
