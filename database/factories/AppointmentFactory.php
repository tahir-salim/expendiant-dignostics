<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 20),
            'payment_type_id' => $this->faker->randomDigit(),
            'status' => $this->faker->randomElement(['booked', 'cancelled', 'completed', 'pending']),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'sub_total' => rand(20, 900),
            'total_tax' => rand(200, 900),
            'grand_total' => rand(200, 900),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid']),
        ];
    }
}
