<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment__types')->insert([
            [
                'name' => 'Pago por tarjeta'
            ],
            [   
                'name' => 'Efectivo'
            ]
        ]);
    }
}
