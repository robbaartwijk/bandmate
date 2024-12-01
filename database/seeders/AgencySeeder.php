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
            'name' => 'Interartists Amsterdam',
            'email' => 'info@hollandmanagement.nl',
            'phone' => '0172435433',
            'address' => 'Piet Heinkade 5',
            'zip' => '1019 BR',
            'city' => 'Amsterdam',
            'state' => 'Noord-Holland',
            'country' => 'Nederland',
            'description' => 'Interartists Amsterdam',
            'email' => 'hylke.v.lingen@interartists.nl',
            'phone' => '+31 6 117 117 20',
            'website' => 'https://interartists.nl',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('agencies')->insert([
            'name' => 'LIWYN Artist Agency',
            'address' => 'A-Lab, Overhoeksplein 2, LAB 206',
            'zip' => '1031 KS',
            'city' => 'Amsterdam',
            'state' => 'Noord-Holland',
            'country' => 'Nederland',
            'description' => 'LIWYN Artist Agency',
            'email' => 'leonieke@liwyn.com',
            'phone' => '+31 (0) 6 2876 3829',
            'website' => 'https://interartists.nl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('agencies')->insert([
            'name' => 'International Artists',
            'address' => 'Kampweg 20',
            'zip' => '5451 VA',
            'city' => 'Mill',
            'state' => 'Noord-Brabant',
            'country' => 'Nederland',
            'description' => 'International Artist',
            'email' => 'info@international-artists.com',
            'phone' => '+31 (0) 6 2876 3829',
            'website' => 'https://www.https://international-artists.com/',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // \App\Models\Agency::factory(100)->create([]);
        
    }
}
