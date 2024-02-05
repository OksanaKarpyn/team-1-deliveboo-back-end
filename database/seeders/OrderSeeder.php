<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Order::truncate();
        Schema::enableForeignKeyConstraints();

        for($i = 0; $i < 10; $i++){
            $restaurants = Restaurant::inRandomOrder()->first();
            $dishes = Dish::where('restaurant_id', $restaurants->id)->inRandomOrder()->take(3)->get();
            $total = 0;
            foreach($dishes as $element){
                $total += $element->price;
            }
            $newOrder = new Order();
            $newOrder->name = $faker->firstName();
            $newOrder->surname = $faker->lastName();
            $newOrder->email = "{$newOrder->name}.{$newOrder->surname}@email.com";
            $newOrder->address = $faker->address();
            $newOrder->status = $faker->boolean();
            $newOrder->notes = $faker->text(50);
            $newOrder->tot_price = $total;
            $newOrder->save();

            foreach($dishes as $element){
                $newOrder->Dish()->attach([
                    $newOrder->id => [
                        'dish_id' => $element->id,
                        'quantity' => count($dishes),
                    ]
                    ]);
            }
            

        }
        
        
    }
}
