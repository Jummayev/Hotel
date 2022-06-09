<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index(): Response|JsonResponse
    {
        $hotels = Hotel::all('region', 'phoneNumber', 'county', 'venueAddress','name', 'type', 'roomCount', 'email', 'amount','images');

        return  response()->json([
            "hotels" => $hotels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelRequest $hotelRequest
     * @return JsonResponse
     */
    public function store(HotelRequest $hotelRequest): JsonResponse
    {
        Hotel::create($hotelRequest);
//        $hotels = json_decode(file_get_contents(storage_path() . '/app/public/hotels.json'), true);
//        $users = User::all();
//        $i =0;
//        foreach ($users as $user){
//            $image = json_encode($hotels[$i]['images']);
//            Hotel::create([
//                'user_id' => $user->id,
//                'region' => $hotels[$i]['viloyat'],
//                'phoneNumber' => $hotels[$i]['tel'],
//                'county' => $hotels[$i]['tuman'],
//                'venueAddress' => $hotels[$i]['manzil'],
//                'name' => $hotels[$i]['name'],
//                'type' => $hotels[$i]['type'],
//                'roomCount' => $hotels[$i]['koyka'],
//                'email' => $hotels[$i]['email'],
//                'amount' => $hotels[$i]['amount'],
//                'images' => $hotels[$i]['images']
//            ]);
//            $i++;
//        }
//        $hotels = Hotel::all();
        return response()->json([
            'success' => true,
            'message' => 'Hotel create success fully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Hotel $hotel
     * @return JsonResponse
     */
    public function show(Hotel $hotel): JsonResponse
    {
        return response()->json([
            "hotel"=>$hotel
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hotel $hotel
     * @return JsonResponse
     */
    public function update(Request $request, Hotel $hotel): JsonResponse
    {
        return response()->json([
            'message' => 'Update not working'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Hotel $hotel
     * @return JsonResponse
     */
    public function destroy(Hotel $hotel): JsonResponse
    {
        $user = User::where('user_id', $hotel->user_id)->get()->toArray();
        if (!empty($user)) {
            $message = 'Hotel Not Delete';
            $code = 400;
        } else {
            $hotel->delete();
            $message = 'Hotel delete success fully';
            $code = 200;
        }
        return response()->json([
            'message' => $message
        ], $code);
    }
}
