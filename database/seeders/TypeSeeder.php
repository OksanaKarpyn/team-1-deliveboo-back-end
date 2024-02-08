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
            ["name" => "Ristorante",
            "cover_img" =>'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D'
            ],
            ["name" => "Pizzeria",
            "cover_img" =>'https://img.freepik.com/free-photo/pizza-pizza-filled-with-tomatoes-salami-olives_140725-1200.jpg?size=626&ext=jpg&ga=GA1.1.1448711260.1707177600&semt=ais'
            ],
            ["name" => "Sushi",
            "cover_img" =>'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3VzaGl8ZW58MHx8MHx8fDA%3D'],
            ["name" => "Fast Food",
            "cover_img" =>'https://img.freepik.com/free-photo/burger-hamburger-cheeseburger_505751-3690.jpg?size=338&ext=jpg&ga=GA1.1.1448711260.1707177600&semt=ais'
            ],
            ["name" => "Osteria",
            "cover_img" =>'https://www.sgranoglutenfree.it/wp-content/uploads/2022/03/tagliere-del-menu-dellosteria.jpg'
            ],
            ["name" => "Caffeteria",
            "cover_img" =>'https://img.freepik.com/premium-photo/morning-breakfast-with-cup-coffee-croissant-table_124507-23091.jpg'
            ],
        ];
        foreach($typologies as $typology){
            $newTypology = new Type();
            $newTypology->name = $typology['name'];  
            $newTypology->cover_img = $typology['cover_img'];       
            $newTypology->save();
        }
    }
}