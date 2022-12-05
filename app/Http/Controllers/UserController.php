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
    /**
     * @param UserLoginRequest $request
     * @return Response|Application|ResponseFactory
     */
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

    /**
     * @param UserStoreRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function store(UserStoreRequest $request): Response|Application|ResponseFactory
    {
        User::create($request->validated());
        return ResponseService::noContent();
    }

    /**
     * @return Response|Application|ResponseFactory
     */
    public function info(): Response|Application|ResponseFactory
    {
        return response(["data"=>UserResource::make(auth()->user())], 200);
    }

    /**
     * @return Application|Response|ResponseFactory
     */
    public function bookingsInfo()
    {
        return response(["data" => User::passenger()]);
    }
}
