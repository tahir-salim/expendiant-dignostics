<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role'=>'Lab',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'role'=>'Hospital',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'role'=>'Patient',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ]);
    }
}
