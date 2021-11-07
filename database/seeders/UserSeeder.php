<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => '1',
                'person_id' => '1',
                'username' => 'GuadAdmin',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => '1',
                'person_id' => '2',
                'username' => 'darlingAdmin',
                'password' => Hash::make('123'),

            ],
            [
                'role_id' => '2',
                'person_id' => '3',
                'username' => 'HelenVentas',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => '2',
                'person_id' => '4',
                'username' => 'CarlosVentas',
                'password' => Hash::make('123'),
            ],
        ]);
    }
}
