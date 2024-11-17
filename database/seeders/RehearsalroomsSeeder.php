<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RehearsalroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $createdDate = Carbon::now();

        DB::table('rehearsalrooms')->insert([
            
            'user_id' => 1,
            'name' => 'De Melkweg',
            'address' => 'Melkweg 1',
            'city' => 'Amsterdam',
            'state' => 'Noord-Holland',
            'zip' => '1017 PB',
            'phone' => '020-1234567',
            'country' => 'Netherlands',
            'email' => 'info@demelkweg.nl',
            'website' => 'https://www.melkweg.nl',
            'description' => 'De Melkweg is een poppodium in Amsterdam. Het is gelegen aan de Lijnbaansgracht, nabij het Leidseplein en het Paradiso. De Melkweg is opgericht in 1970 en is een van de bekendste poppodia van Nederland.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

         DB::table('rehearsalrooms')->insert([
            'user_id' => 1,
            'name' => 'De Max',
            'address' => 'Olympiaweg 1',
            'city' => 'Alphen aan den Rijn',
            'state' => 'Zuidd-Holland',
            'zip' => '2026 AP',
            'country' => 'Netherlands',
            'phone' => '0172-1234567',
            'email' => 'info@demax.nl',
            'website' => 'https://www.demax.nl',
            'description' => 'De Max is een poppodium in Alphen aan den Rijn.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);


    }
}
