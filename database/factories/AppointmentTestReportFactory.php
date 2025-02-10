<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppointmentTestReport>
 */
class AppointmentTestReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'test_id' => rand(1, 11),
            'appointment_id' => $this->faker->randomDigit(),
            'amount' => rand(20, 900),
            'report_status' => $this->faker->randomElement(['Report Awaited', 'Report Generated']),
        ];
    }
}
