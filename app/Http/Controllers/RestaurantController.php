<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::all();
        //
        return view('user.restaurant.index', compact('restaurants'));
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
    public function store(Request $request)
    {
        /*


        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }

        if (isset($formData['cv'])) {
            $cv_path = Storage::put('uploads/pdf', $formData['cv']);
        }

        $teacher = Teacher::create(
        [
            'user_id'=>$formData['user_id'],
            'bio'=>  $formData['bio'],
            'cv' =>  $cv_path,
            'photo' =>  $photo_path,
            'phone' =>  $formData['phone'],
            'service' =>  $formData['service'],
        ]);

        if (isset($formData['subjects'])) {
            foreach ($formData['subjects'] as $subjectId) {

                $teacher->subjects()->attach($subjectId);
            }
        }

        $user = User::find(auth()->user()->id);
        $user->teacher_id = $teacher->id;
        $user->save();
        */
        $formData = $request->validated();
        $photo_path = null;

        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }
        //
        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
