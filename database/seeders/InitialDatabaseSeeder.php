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
        ]);

        // Fill main tables
        Rehearsalroom::factory(5)->create();

        // Fill user data tables

        // Add standard users and fill table with random users
        $this->call([
            ActSeeder::class,
        ]);

        $this->call([
            AvailablemusicianSeeder::class,
        ]);

        Vacancy::factory(15)->create();

        $this->call([
            VenueSeeder::class,
            AgencySeeder::class,
        ]);

    }
}
