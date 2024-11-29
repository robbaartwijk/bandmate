<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\User;
Use App\Models\Act;
Use App\Models\Instrument;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vacancies>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all()->pluck('id')->toArray();
        $acts = Act::all()->pluck('id')->toArray();
        $instruments = Instrument::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($users),
            'act_id' => $this->faker->randomElement($acts),
            'instrument_id' => $this->faker->randomElement($instruments),
            'description' => $this->faker->paragraph(20),
            'date_created' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_updated' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
