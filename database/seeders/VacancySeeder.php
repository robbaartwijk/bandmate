<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacancies = [
            [
                'user_id' => 1,
                'act_id' => 1,
                'instrument_id' => 1,
                'description' => 'This is a dummy vacancy',
                'date_created' => Carbon::now(),
                'date_updated' => Carbon::now()
            ]
        ];
        
        \DB::table('vacancies')->insert($vacancies);

        \App\Models\Vacancy::factory(100)->create([]);

    }

}
