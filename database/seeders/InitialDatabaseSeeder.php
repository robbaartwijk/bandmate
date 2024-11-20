<?php

namespace Database\Seeders;

use App\Models\Act;
use App\Models\Rehearsalroom;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Venue;
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
        // Fill supporting tables
        $this->call([
            GenreSeeder::class,
            InstrumentSeeder::class,
        ]);

        // Add standard users
        $this->call([
            UserTableSeeder::class,
        ]);

        // Fill main tables
        User::factory(30)->create();
        Act::factory(10)->create();

        // Fill user data tables
        Rehearsalroom::factory(10)->create();
        Venue::factory(24)->create();
        Vacancy::factory(20)->create();

    }
}
