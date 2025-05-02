<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'dni' => $this->faker->unique()->time('s'), // Simulating a DNI as an integer  
            'state' => $this->faker->country(),
            'city' => $this->faker->city(),
            'parish' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'voting_center' => $this->faker->word(),
            'address' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
