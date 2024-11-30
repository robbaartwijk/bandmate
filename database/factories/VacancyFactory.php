<?php

namespace Database\Factories;

use App\Models\Act;
use App\Models\Instrument;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
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
        $instruments = Instrument::all()->pluck('id')->toArray();

        $randomUser = User::inRandomOrder()->first();
        $randomUserID = $randomUser->id;

        $randomAct = Act::where('user_id', $randomUserID)->first();

        if ($randomAct === null) {
            $randomActID = Act::factory()->create([
                'user_id' => $randomUserID,
            ])->id;
        } else {
            $randomActID = $randomAct->id;
        }

        return [
            'act_id' => $randomActID,
            'user_id' => $randomUserID,
            'instrument_id' => $this->faker->randomElement($instruments),
            'description' => $this->faker->paragraph(20),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
