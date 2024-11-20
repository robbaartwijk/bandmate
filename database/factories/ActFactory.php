<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acts>
 */
class ActFactory extends Factory
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

        return [
            'user_id' => $this->faker->randomElement($users),
            'name' => $this->faker->name,
            'genre_id' => $this->faker->randomElement($genres),
            'rehearsal_room' => $this->faker->boolean,
            'number_of_members' => $this->faker->numberBetween(1, 10),
            'active' => $this->faker->boolean,
            'website' => $this->faker->url,
            'description' => $this->faker->text,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'twitter' => $this->faker->url,
            'youtube' => $this->faker->url,
            'spotify' => $this->faker->url,
            'soundcloud' => $this->faker->url,
        ];
    }
}
