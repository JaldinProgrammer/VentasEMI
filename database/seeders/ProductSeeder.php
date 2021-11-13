<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                
                'name' => 'jamon serrano 300 gr',
                'price' => '20',
                'category_id' => 1,
                'stock' => '20'
            ],
            [
                
                'name' => 'tocino 100 gr',
                'price' => '15',
                'category_id' => 1,
                'stock' => '50'
            ],
            [
                
                'name' => 'Pechuga de pollo 250 gr',
                'price' => '20',
                'category_id' => 1,
                'stock' => 0
            ],
            [
                
                'name' => 'Chorizo parrillero 1 Unidad',
                'price' => '4',
                'category_id' => 1,
                'stock' => '200'
            ],
            [
                
                'name' => 'Leche pil 954 ml',
                'price' => '6',
                'category_id' => 2,
                'stock' => '50'
            ],
            [
                
                'name' => 'queso cheddar 300 gr',
                'price' => '10',
                'category_id' => 2,
                'stock' => 0
            ],
            [
                
                'name' => 'yogurt 1 lt',
                'price' => '15',
                'category_id' => 2,
                'stock' => 0
            ],
            [
                
                'name' => 'Tomate 1 unidad',
                'price' => '2',
                'category_id' => 3,
                'stock' => 0
            ],
            [
                
                'name' => 'cebolla 1 unidad',
                'price' => '1.5',
                'category_id' => 3,
                'stock' => 0
            ],
            [
                
                'name' => 'mayonesa Heinz 300gr',
                'price' => '15.5',
                'category_id' => 4,
                'stock' => 0
            ],
            [
                
                'name' => 'galleta oreo 1 paquete mini',
                'price' => '4.5',
                'category_id' => 5,
                'stock' => 0
            ],
            [
                
                'name' => 'jaboncillo rexona 1 unidad',
                'price' => '7.5',
                'category_id' => 6,
                'stock' => 0
            ],
        ]);
    }
}
