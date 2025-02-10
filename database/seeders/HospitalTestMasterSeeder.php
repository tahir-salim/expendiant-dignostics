<?php

namespace Database\Seeders;

use App\Models\HospitalTestMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalTestMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HospitalTestMaster::factory()->count(10)->create();
    }
}
