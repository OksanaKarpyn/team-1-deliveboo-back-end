<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        //
        return view('user.restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();
        //
        return view('user.restaurant.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {

        $formData = $request->validated();
        $photo_path = null;

        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }

        $restaurant = Restaurant::create(
            [
                //da aggiungere voci del form
                'photo' => $photo_path,

            ]
        );

        $user = User::find(auth()->user()->id);
        $user->restaurant_id = $restaurant->id;
        $user->save();
        //
        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        
        return view('user.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {

        //
        return view('user.restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        
        return redirect()->route(); //da determinare redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        Restaurant::destroy($restaurant->id);
        User::destroy(auth()->user()->id);
        //
        return redirect()->route('user.restaurants.index');
    }
}
