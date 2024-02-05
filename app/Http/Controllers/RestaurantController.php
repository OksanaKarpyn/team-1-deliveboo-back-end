<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Models\Order;
use App\Models\Type;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->with('types', 'dishes')->first();
        $orders = [];
        if (count($restaurant->dishes) > 0) {
            foreach ($restaurant->dishes as $dish) {
                $id = $dish->id;
                $order = Order::whereHas('dish', function ($query) use ($id) {
                    $query->where('dishes.id', $id);
                })->get();
                $orders[] = $order;
            }
        }
        return view('user.restaurant.index', compact('restaurant', 'orders'));
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
        dd($formData);
        $photo_path = null;

        // if (isset($formData['photo'])) {
        //     $photo_path = Storage::put('uploads/images', $formData['photo']);
        // }

        $restaurant = Restaurant::create([
            'name' => $formData['restaurant_name'],
            'address' => $formData['restaurant_address'],
            'phone' => $formData['restaurant_phone'],
            'description' => $formData['restaurant_description'],
            'photo' => $formData['restaurant_photo'],
        ]);

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
        /* 
        Proteziona della rotta controllando se il ristorante che viene passato é quello dell'utente autenticato
        */
        if ($restaurant->user_id != Auth::user()->id) {
            return to_route('user.restaurant.index');
        }
        $editRestaurant = Restaurant::where('user_id', Auth::user()->id)->with('types')->first();
        $typologies = Type::all();

        return view('user.restaurant.edit', compact('editRestaurant', 'typologies'));
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
        $data = $request->validated();

        $updateRestaurant = Restaurant::where('id', $restaurant->id)->first();

        $updateRestaurant->activity_name  = $data['name'];
        $updateRestaurant->address = $data['address'];
        $updateRestaurant->description = $data['description'];
        $updateRestaurant->phone = $data['phone'];

        if (isset($data['photo'])) {
            if ($updateRestaurant->photo) {
                Storage::delete($updateRestaurant->photo);
            }
            $updateRestaurant->photo = Storage::put('uploads', $data['photo']);
        }
        $updateRestaurant->save();

        if ($data['types']) {
            $updateRestaurant->types()->sync($data['types']);
        }

        return redirect()->route('user.restaurant.index')->with('message', 'Ristorante aggiornato con successo'); //da determinare redirect
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
        return redirect()->route('user.restaurant.index');
    }
}
