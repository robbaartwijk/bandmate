<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agencies')->insert([
            'id' => 1,
            'name' => 'Acme Agency',
            'email' => 'info@acme.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'zip' => '12345',
            'city' => 'Anytown',
            'state' => 'NY',
            'country' => 'USA',
            'description' => 'We are the best agency in the world!',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('agencies')->insert([
            'id' => 2,
            'name' => 'Holland Management',
            'email' => 'info@hollandmanagement.nl',
            'phone' => '0172435433',
            'address' => 'Brederodestraat 1',
            'zip' => '2406LR',
            'city' => 'Alphen aan den Rijn',
            'state' => 'Zuid-Holland',
            'country' => 'Nederland',
            'description' => 'We are the best agency in the Netherlands!',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
