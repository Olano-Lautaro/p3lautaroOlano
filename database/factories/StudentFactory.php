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
    public function definition(): array
    {
        return [
        
            'name'=> fake()->firstname(),
            'lastname'=> fake()->lastname(),
            'dni'=> fake()->dni(),
            'birthday'=> fake()->datetime('Y-m-d'),
            'status'=>fake()->numberBetween(1,2)
        ];
    }
}
