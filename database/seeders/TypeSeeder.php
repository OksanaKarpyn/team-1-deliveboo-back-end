<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $typologies = [
            ["name" => "Ristorante"],
            ["name" => "Pizzeria"],
            ["name" => "Sushi"],
            ["name" => "Fast Food"],
            ["name" => "Osteria"],
            ["name" => "Caffeteria"],
        ];
        foreach($typologies as $typology){
            $newTypology = new Type();
            $newTypology->name = $typology['name'];        
            $newTypology->save();
        }
    }
}