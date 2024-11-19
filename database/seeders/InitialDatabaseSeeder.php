<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InitialDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RehearsalroomsSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(InstrumentsSeeder::class);
        $this->call(ActsSeeder::class);
        $this->call(VacanciesSeeder::class);
        $this->call(VenuesSeeder::class);

    }
}
