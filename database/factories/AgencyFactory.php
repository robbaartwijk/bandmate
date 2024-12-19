<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'zip' => $this->faker->postcode,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'website' => $this->faker->url,
            'description' => $this->faker->text,
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
 