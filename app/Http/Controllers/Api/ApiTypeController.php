<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;

class ApiTypeController extends Controller
{
    public function index()
    {
        // questa va usata per gestire  dento laravel
        // $types = DB::table('types')->get();
        // return view('user.index', ['types' => $types]);

        //questa sintassi serve se devi creare Api e usare esterno/frontend
        $types = Type::all();

        $response = [
            "success" => true,
            "results" => $types
        ];
        return response()->json($response, 200);
        //127.0.0.1:8000/api/api/types
    }

    public function show($id)
    {
        //
        if (count($id) == 1) {
            return
                $types = Type::with('restaurants')
                    ->find($id)
                    ->get();
        } else if (count($id) == 0) {
            return redirect()->action('Api\ApiRestaurantController@index');
        } else {
            return
                $types = Type::whereIn('id', $id)->with('restaurants')
                    ->find()
                    ->get();
        }


    }
}