<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acts>
 */
class AvailablemusicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $genres = \App\Models\Genre::pluck('id')->toArray();
        $instrument = \App\Models\Instrument::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($users),
            'genre_id' => $this->faker->randomElement($genres),
            'instrument_id' => $this->faker->randomElement($instrument),
            'description' => $this->faker->paragraph(30),
            'available_from' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'available_until' => $this->faker->dateTimeBetween('+1 years', '+2 years'),

            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
