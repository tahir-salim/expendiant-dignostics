<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                RoleSeeder::class,
                PaymentTypeSeeder::class,
                TestCategorySeeder::class,
                UserSeeder::class,
                TestSeeder::class,
                HospitalSeeder::class,
                SettingSeeder::class,
                AppointmentSeeder::class,
                AppointmentTestReportSeeder::class,
                FaqSeeder::class,
                HospitalTestMasterSeeder::class,
                HospitalTestSeeder::class
            ]
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
