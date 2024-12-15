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
            'description' => $this->faker->paragraph(30),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'facebook' => 'https://www.facebook.com/' . $this->faker->url,
            'instagram' => 'https://www.instagram.com/' . $this->faker->url,
            'twitter' => 'https://www.twitter.com/' . $this->faker->url,
            'youtube' => 'https://www.youtube.com/' .  $this->faker->url,
            'spotify' => 'https://www.spotify.com/' . $this->faker->uuid,
            'soundcloud' => 'https://www.soundcloud.com/' .  $this->faker->url,
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
