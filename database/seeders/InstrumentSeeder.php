<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $date = Carbon::now()->modify('-2 year');
        $createdDate = clone($date);

        // Guitars and basses
        DB::table('instruments')->insert([
            'name' => 'Electric Guitar',
            'type' => 'Strings',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Bass Guitar',
            'type' => 'Strings',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Acoustic Guitar',
            'type' => 'String',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Keyboards§
        DB::table('instruments')->insert([
            'name' => 'Piano',
            'type' => 'Keyboards',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Organ',
            'type' => 'Keyboards',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Synthesizer',
            'type' => 'Keyboards',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Harpsichord',
            'type' => 'Keyboards',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Drums and percussion
        DB::table('instruments')->insert([
            'name' => 'Drums',
            'type' => 'Drums and Percussion',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Percussion',
            'type' => 'Drums and Percussion',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Wind instruments
        DB::table('instruments')->insert([
            'name' => 'Flute',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Clarinet',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Saxophone',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Trumpet',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Trombone',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Tuba',
            'type' => 'Wind',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        
        // Other
        DB::table('instruments')->insert([
            'name' => 'Violin',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Cello',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Harp',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Accordion',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Bagpipes',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Banjo',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Mandolin',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Ukulele',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Harmonica',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('instruments')->insert([
            'name' => 'Theremin',
            'type' => 'Other',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        
        // Vocals
        DB::table('instruments')->insert([
            'name' => 'Vocals',
            'type' => 'Vocals',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        DB::table('instruments')->insert([
            'name' => 'Lead Vocals',
            'type' => 'Vocals',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        DB::table('instruments')->insert([
            'name' => 'Background Vocals',
            'type' => 'Vocals',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

    }
}
