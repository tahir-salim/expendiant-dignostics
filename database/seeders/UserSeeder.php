<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name'=>'Lab',
            'email'=>'lab@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('lab123'),
            'role_id'=>1,
            'is_active'=>1,
            'phone'=>"+111222333",
            'gender'=>'others',
            'created_at'=>Carbon::now(),
        ],);
        DB::table('users')->insert([
            'name'=>'Hospital',
            'email'=>'hospital@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('hospital123'),
            'role_id'=>2,
            'hospital_id'=>1,
            'is_active'=>1,
            'phone'=>"+111222333",
            'gender'=>'others',
            'created_at'=>Carbon::now(),
        ],);
        DB::table('users')->insert([
            'name'=>'Patient',
            'email'=>'patient@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('patient123'),
            'role_id'=>3,
            'is_active'=>1,
            'phone'=>"+111222333",
            'gender'=>'others',
            'created_at'=>Carbon::now(),
        ],);
    }
}
