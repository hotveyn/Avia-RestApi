<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\BookingShowUserResource;
use App\Models\Passenger;
use App\Services\ResponseService;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserTokenService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function login(UserLoginRequest $request): Response|Application|ResponseFactory
    {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            $user->api_token = UserTokenService::generate();
            $user->save();

            return ResponseService::success([
                "token" => $user->api_token
            ]);
        }
        return ResponseService::error('Unauthorized', 401, [
            "phone" => ["phone or password incorrect"]
        ]);
    }

    public function store(UserStoreRequest $request): Response|Application|ResponseFactory
    {
        User::create($request->validated());
        return ResponseService::noContent();
    }

    public function info(): Response|Application|ResponseFactory
    {
        if (auth()->check()) {
            $user = auth()->user();
            return response([
                UserResource::collection($user)
            ], 200);
        } else {
            return ResponseService::error("Unauthorized", 401);
        }
    }

    public function bookingsInfo()
    {
        $userId = auth()->id();
        $userDoc = User::where("id", $userId)->first()->document_number;
        $passenger = Passenger::where("document_number", $userDoc)->first();

        return BookingShowUserResource::make($passenger->bookings);
//        if (auth()->check()) {
//            $user = auth()->user()->document_number;
//            return response([
//                UserResource::collection($user)
//            ], 200);
//        } else {
//            return ResponseService::error("Unauthorized", 401);
//        }
    }
}
