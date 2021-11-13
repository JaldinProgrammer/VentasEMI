<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon('America/La_Paz');
        DB::table('product_suppliers')->insert([

            [
                
                'supplier_id' => '1',
                'product_id' => '1',
                'cost' => '14',
                'total' => '280',
                'amount' => '20',
                'created_at' => $carbon->now()
            ],
            [
                
                'supplier_id' => '1',
                'product_id' => '2',
                'cost' => '10',
                'total' => '500',
                'amount' => '50',
                'created_at' => $carbon->now()
            ],
            [
                
                'supplier_id' => '1',
                'product_id' => '4',
                'cost' => '2',
                'total' => '400',
                'amount' => '200',
                'created_at' => $carbon->now()
            ],
            [
                
                'supplier_id' => '2',
                'product_id' => '5',
                'cost' => '4',
                'total' => '200',
                'amount' => '50',
                'created_at' => $carbon->now()
            ],
        ]);
    }
}
