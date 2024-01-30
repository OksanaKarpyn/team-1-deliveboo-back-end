<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dish\StoreDishRequest;
use App\Http\Requests\Dish\UpdateDishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $dishes = Dish::all();
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
        //dd($request);
        $validated_data = $request->validated();
        if($request->hasFile('photo')){
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $validated_data['photo'] = $path_img;
            // dd($path_img);
            
        }

        if (Auth::user()->restaurant) {
            $new_dish = new Dish();
            $validated_data['restaurant_id'] = Auth::user()->restaurant->id;
            $new_dish->fill($validated_data);
           // dd($new_dish);
            $new_dish->save();
        } else {
         
            dd("L'utente non ha un ristorante associato.");
            return redirect()->back()->with('error', 'Devi creare un ristorante prima di aggiungere piatti.');
        }

        return redirect()->route('user.dish.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $singledish = Dish::findOrFail($id);

        return view('user.dish.show', compact('singledish'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $dish = Dish::find($id);
        //dd( $dish);
        return view('user.dish.edit', compact('dish'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, Dish $dish) {
        $validated_data = $request->validated(); 
        
        // if($request->hasFile('photo')){
        //     if( $dish->photo ){
        //         Storage::delete($dish->photo);
        //     }
        //     $path = Storage::disk('public')->put('folderPhoto', $request->photo);
        //     $form_data['photo'] = $path;
        // }
        // if ($request->has('delete_photo')) {
        //     if ($dish->photo) {
        //         Storage::delete($dish->photo);
        //         $dish->photo = null;
        //     }
        // }
        if($request->hasFile('photo')){
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $validated_data['photo'] = $path_img;
            // dd($path_img);
            
        }
        $validated_data['restaurant_id'] = Auth::user()->id;
        $dish->fill($validated_data);
        $dish->update();

       return redirect()->route('user.dish.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $dish = Dish::find($id);
        $dish->delete();
        return redirect()->route('user.dish.index');
        
    }
}