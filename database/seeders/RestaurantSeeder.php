<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use Faker\Generator as Faker; 

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach($users as $userElem){
            $newRestaurants = new Restaurant();
            $newRestaurants->user_id = $userElem->id;
            $newRestaurants->activity_name = $faker->name();
            $newRestaurants->address = $faker->address();
            $newRestaurants->photo = 'null';
            $newRestaurants->phone = $faker->phoneNumber();
            $newRestaurants->description = $faker->text(100);
            $newRestaurants->p_iva = $faker->randomNumber(7, true);
            $newRestaurants->save();
        }
    }
}