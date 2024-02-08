<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->with('dishes')->first();
        $allOrders = [];
        if (count($restaurant->dishes) > 0) {
            foreach ($restaurant->dishes as $dish) {
                $id = $dish->id;
                $orders = Order::whereHas('dish', function ($query) use ($id) {
                    $query->where('dishes.id', $id);
                })->with('dish')->get();
                if(count($orders) > 0){
                    foreach($orders as $order){
                        if(!in_array($order,$allOrders)){
                            $allOrders[] = $order;
                        }
                    }
                }
            }
        }
        return view('user.order.index', compact('allOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //$formDataValidate = $request->validated();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {   
        // if (!auth()->user()->restaurant_id) {
        // return redirect()->route('user.restaurant.create');
        // }
        return view('user.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateOrderRequest $request, Order $order)
    {
        //$formDataValidate = $request->validated();
        return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect()->route('user.order.index');
    }
}