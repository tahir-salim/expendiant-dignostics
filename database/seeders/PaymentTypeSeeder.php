<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'name'=>'Online',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
        DB::table('payment_types')->insert([
            'name'=>'Onsite',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
    }
}
