<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Support\Facades\Log; 

class ApiDishController extends Controller
{
    public function index()
    {
        // Seleziona solo i piatti disponibili
        $availableDishes = Dish::where('avaible', 1)->get();

        $response = [
            "success" => true,
            "results" => $availableDishes
        ];

        return response()->json($response, 200);
    
      //127.0.0.1:8000/api/api/dishes


    }

    public function show($id)
    {
        // Codice per l'azione show
    }

}