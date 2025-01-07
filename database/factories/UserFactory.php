<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'stage_name' => fake()->name(), 
            'phone' => fake()->phoneNumber(),
            'street' => fake()->streetName(),
            'street_number' => fake()->buildingNumber(),
            'zip' => fake()->postcode(),
            'state' => fake()->state(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'email_notification_all' => fake()->boolean(),
            'email_notification_acts' => fake()->boolean(),
            'email_notification_vacancies' => fake()->boolean(),
            'email_notification_availablemusicians' => fake()->boolean(),
            'email_notification_rehearsalrooms' => fake()->boolean(),
            'email_notification_venues' => fake()->boolean(),
            'email_notification_agencies' => fake()->boolean(),
            'email_notification_newsletter' => fake()->boolean(),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'created_at' => fake()->dateTimeBetween('2024-01-01', '2024-09-30'),
            'updated_at' => fake()->dateTimeBetween('2024-10-01', '2024-12-31'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(?callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
