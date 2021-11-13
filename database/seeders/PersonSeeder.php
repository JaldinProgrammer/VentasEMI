<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
                
                'name' => 'Guadalupe Lora Gonzales',
                'phone' => '78926834',
                'email' => 'guada@gmail.com',
                'gender' => 1,
                'nit' => '65423424'
            ],
            [
                
                'name' => 'Darling Salazar',
                'phone' => '76043921',
                'email' => 'darling@gmail.com',
                'gender' => 1,
                'nit' => '123312342'
            ],
            [
                
                'name' => 'Helen Camila Corazon',
                'phone' => '78645932',
                'email' => 'helen@gmail.com',
                'gender' => 1,
                'nit' => '8674623422'
            ],
            [
                
                'name' => 'Carlos Jaldin',
                'phone' => '76031231',
                'email' => 'carlos@gmail.com',
                'gender' => 0,
                'nit' => '3431241231'
            ],
            [
                
                'name' => 'Cristiano Ronaldo',
                'phone' => '762342231',
                'email' => 'cr7@gmail.com',
                'gender' => 0,
                'nit' => '231313432'
            ],
        ]);
    }
}
