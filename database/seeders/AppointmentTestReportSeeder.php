<?php

namespace Database\Seeders;

use App\Models\AppointmentTestReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentTestReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentTestReport::factory()->count(10)->create();
    }
}
