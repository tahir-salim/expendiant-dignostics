<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalTestMaster>
 */
class HospitalTestMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hospital_id' => rand(1, 11),
            'hospital_test_id' => rand(1, 10),
            'date' => $this->faker->date(),
            'master_time' => $this->faker->time(),
            'grand_total' => rand(200, 900),
            'no_of_patients' => rand(20, 90),
            'no_of_test' => rand(20, 90),
            'sample_delivery_type' => $this->faker->randomElement(['deliver', 'pick_up']),
        ];

    }
}
