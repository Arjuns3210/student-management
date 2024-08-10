<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_name' => $this->faker->name,
            'class_teacher_id' => \App\Models\Teacher::all()->random()->id,
            'class' => $this->faker->randomElement(['1A', '2B', '3C']),
            'admission_date' => $this->faker->date(),
            'yearly_fees' => $this->faker->randomFloat(2, 500, 5000),
        ];
    }
}
