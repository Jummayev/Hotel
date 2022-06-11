<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Region;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function home(): JsonResponse
    {
        $regions =  Region::select([
            'id',
            'name'
        ])->with('districts')->get()->toArray();
        $i =0;
        foreach ($regions as $region){
            $j=0;
            $regions[$i]['hotelCount'] = Hotel::where('region', $region['name'])->count();
                foreach ($region['districts'] as $district){
                    $regions[$i]['districts'][$j]['hotelCount'] = Hotel::where('county', $district['name'])->count();
                    $j++;
                }
            $i++;
        }
        $topCity[0]['name'] = "Toshkent";
        $topCity[0]['image'] = 'https://mybooking.uz/uploads/destinations/1595165126WHPM.jpg';
        $topCity[0]['hotelCount'] = Hotel::where('region', 'LIKE', "%Toshkent shahar%")->count();
        $topCity[1]['name'] = 'Xiva';
        $topCity[1]['image'] = "https://mybooking.uz/uploads/destinations/1599825933kVDh.jpg";
        $topCity[1]['hotelCount'] = Hotel::where('county', 'LIKE', '%Xiva%')->count();
        $topCity[2]['name'] = 'Samarqand';
        $topCity[2]['image'] = 'https://mybooking.uz/uploads/destinations/1595165126WHPM.jpg';
        $topCity[2]['hotelCount'] = Hotel::where('county', 'LIKE', '%Samarqand%')->count();
        $topCity[3]['name'] = 'Buxoro';
        $topCity[3]['image'] = 'https://mybooking.uz/uploads/destinations/1595165126WHPM.jpg';
        $topCity[3]['hotelCount'] = Hotel::where('region', 'LIKE', '%Buxoro%')->count();

        return response()->json([
            "search" => $regions,
            "hotels" => Hotel::all(),
            "topCity" => $topCity,
        ]);
    }
}
