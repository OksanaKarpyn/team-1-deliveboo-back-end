<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Type;

class ApiRestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();// se voi solo ristoranti
        // dd($restaurants);
        $restaurants = Restaurant::with(['types'])
            ->paginate(10);

        $response = [
            "success" => true,
            "results" => $restaurants
        ];

        return response()->json($response, 200);
        // 127.0.0.1:8000/api/api/restaurants

    }


    public function show($id)
    {
        //
        $restaurant = Restaurant::with('dishes', 'types')
            ->find($id)
            ->first();

        if ($restaurant) {
            return response()->json([
                "success" => true,
                "results" => $restaurant
            ]);
        } else {
            return response()->json([
                "success" => false,
                "results" => 'Ristorante non trovato'
            ], 404);
        }
    }
}