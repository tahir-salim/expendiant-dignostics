<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = [
            [
                'user_id' => rand(1, 9),
                'name' => 'Hospital',
                'phone' => "+111222333",
                'address' => "Abc address",
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => rand(1, 9),
                'name' => 'Hospital123',
                'phone' => "+9521478522",
                'address' => "EFG address",
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => rand(1, 9),
                'name' => 'Hospital456',
                'phone' => "+9532147692",
                'address' => "HIJ address",
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('hospitals')->insert($hospitals);
    }
}
