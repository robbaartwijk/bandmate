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
        $date = Carbon::now()->modify('-2 year');
        $createdDate = clone($date);

        DB::table('vacancies')->insert([
            'user_id' => 1,
            'act_id' => 1,
            'instrument_id' => 1,
            'description' => 'Guitarist Wanted',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
    }
}
