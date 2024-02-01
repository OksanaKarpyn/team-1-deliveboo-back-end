<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Dish;
use App\Models\Restaurant;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        $dishes=[
         "Pasta alla carbonara",
          "Pizza Margherita",
          "Lasagne alla bolognese",
          "Risotto ai funghi", 
          "Spaghetti alla puttanesca",
          "Cotoletta alla milanese",
          "Pollo alla cacciatora",
          "Bistecca alla fiorentina",
          "Insalata caprese", 
          "Tiramisù",
        ];
        foreach($restaurants as $restaurantElem){
            for($i = 0; $i < 5;$i++){
                $newDishes = new Dish();
                $newDishes->name = $dishes[$i];
                $newDishes->restaurant_id = $restaurantElem['id'];
                $newDishes->description = $faker->text(100);
                $newDishes->ingredients = $faker->words(5,true);
                $newDishes->price = $faker->randomFloat(2, 5, 20);
                $newDishes->avaible = $faker->boolean();
                $newDishes->save();
            }

        }
    }
}