<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder {

    /**
    * Run the database seeds.
    */
    public function run(): void {
        $venues = [
            [
                'user_id' => 1,
                'name' => 'The Venue',
                'address' => '123 Main St',
                'zip' => '12345',
                'city' => 'Anytown',
                'state' => 'NY',
                'country' => 'USA',
                'phone' => '555-1234',
                'email' => 'info@thevenue.com'
            ]
        ];
    }
}
