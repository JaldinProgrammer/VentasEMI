<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([

            [
                
                'name' => 'Carnessa'
            ],
            [
                
                'name' => 'Milkilena'
            ],
            [
                
                'name' => 'Tetrapac'
            ]
        ]);
    }
}
