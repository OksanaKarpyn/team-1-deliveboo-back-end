<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dish\StoreDishRequest;
use App\Http\Requests\Dish\UpdateDishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
            $dish = Dish::all();
            
            return view('user.dish.index', compact('dishes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $dishes = Dish::all();
        
        return view('user.dish.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request) {

        $formData = $request->validated();
        $photo_path = null;

        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }
        
        $dish = Dish::create([
                
                'photo' => $photo_path,

            ]
        );

        return redirect()->route('dish.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish) {
        return view('restaurant.dish.show', compact('dish'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish) {

        return view('restaurant.dish.show', compavt('dish'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish) {
        return redirect()->route(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish) {

        Dish::destroy($dish->id);

        return redirect()->route('user.dishes.index');
        
    }
}
