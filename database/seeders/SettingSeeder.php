<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'setting_name'=>'currency',
            'setting_value'=>'$',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
        DB::table('settings')->insert([
            'setting_name'=>'open_timing',
            'setting_value'=>'10:00',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
        DB::table('settings')->insert([
            'setting_name'=>'close_timing',
            'setting_value'=>'18:00',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
        DB::table('settings')->insert([
            'setting_name'=>'timing_gap',
            'setting_value'=>'15',
            'is_active'=>1,
            'created_at'=>Carbon::now(),
        ],);
    }
}
