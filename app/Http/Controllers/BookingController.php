<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingShowResource;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        return response($request->validated());
    }

    public function info(Booking $code)
    {

        return BookingShowResource::make($code);
    }
}
