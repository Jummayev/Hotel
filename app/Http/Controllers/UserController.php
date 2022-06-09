<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            "users"=> User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $userRequest
     * @return JsonResponse
     */
    public function store(UserRequest $userRequest): JsonResponse
    {
        $userRequest['password']= Hash::make($userRequest['password']);

        User::create($userRequest);

        return response()->json([
            'success'=>true,
            "message" => "user create success fully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $userRequest
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $userRequest, User $user): JsonResponse
    {
        return response()->json([
            "message" => "Update not working"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $hotel = Hotel::where('user_id', $user->id)->get()->toArray();
        if (!empty($hotel)){
            $message = "User Not Delete";
            $code = 400;
        }else{
            $user->delete();
            $message = 'User delete success fully';
            $code = 200;
        }
        return response()->json([
            'message' => $message
        ], $code);
    }
}
