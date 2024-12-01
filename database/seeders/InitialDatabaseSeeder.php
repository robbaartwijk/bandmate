<?php

namespace Database\Seeders;

use App\Models\Act;
use App\Models\Rehearsalroom;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Venue;
use App\Models\Agency;
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

        // Add standard users and fill table with random users
        $this->call([
            UserTableSeeder::class,
            User::factory(30)->create()
        ]);

        // Fill main tables
        Rehearsalroom::factory(10)->create();

        // Fill user data tables
        Act::factory(10)->create();
        Vacancy::factory(20)->create();
        VenueSeeder::class;
        AgencySeeder::class;
    }
}
