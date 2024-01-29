<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        for($i = 1; $i < 15; $i++){
            $newUser = new User();
            $newUser->name = $faker->unique()->firstName;
            $newUser->email = $faker->unique()->email;
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}