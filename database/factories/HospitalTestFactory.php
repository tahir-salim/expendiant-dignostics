<?php

namespace Database\Factories;

use App\Models\HospitalTest;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalTest>
 */
class HospitalTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hospital_test_master_id' => rand(1, 11),
            'hospital_id' => $this->faker->randomDigit(),
            'patient_id' => rand(1000, 9999),
            'patient_fullname' => $this->faker->name,
            'patient_email' => $this->faker->email(),
            'patient_phone' => $this->faker->phoneNumber(),
            'patient_age' => rand(20, 90),
            'patient_gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'sample_delivery' => $this->faker->randomElement(['pick_up', 'deliver']),
            'sub_total' => rand(1000, 9999),
            'grand_total' => rand(1000, 9999),
            'status' => $this->faker->randomElement(['pending', 'in_process', 'completed']),
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->address,
            'payment_status' => rand(0, 1),
        ];
    }
}
