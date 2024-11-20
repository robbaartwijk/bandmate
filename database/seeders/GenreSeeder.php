<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $date = Carbon::now()->modify('-2 year');
        $createdDate = clone($date);

        // Rock
        DB::table('genres')->insert([
            'name' => 'Rock',
            'group' => 'Rock',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Hard Rock',
            'group' => 'Rock',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Heavy Metal',
            'group' => 'Rock',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Progressive Rok',
            'group' => 'Rock',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Jazz
        DB::table('genres')->insert([
            'name' => 'Jazz',
            'group' => 'Jazz',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Smooth Jazz',
            'group' => 'Jazz',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Fusion',
            'group' => 'Jazz',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Blues
        DB::table('genres')->insert([
            'name' => 'Blues',
            'group' => 'Blues',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Chicago Blues',
            'group' => 'Blues',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Delta Blues',
            'group' => 'Blues',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Classical
        DB::table('genres')->insert([
            'name' => 'Classical',
            'group' => 'Classical',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Baroque',
            'group' => 'Classical',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Romantic',
            'group' => 'Classical',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Pop
        DB::table('genres')->insert([
            'name' => 'Pop',
            'group' => 'Pop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Dance Pop',
            'group' => 'Pop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Synth Pop',
            'group' => 'Pop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Country
        DB::table('genres')->insert([
            'name' => 'Country',
            'group' => 'Country',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Bluegrass',
            'group' => 'Country',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Western Swing',
            'group' => 'Country',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Hip Hop
        DB::table('genres')->insert([
            'name' => 'Hip Hop',
            'group' => 'Hip Hop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Rap',
            'group' => 'Hip Hop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Trap',
            'group' => 'Hip Hop',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        // Electronic
        DB::table('genres')->insert([
            'name' => 'Electronic',
            'group' => 'Electronic',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'House',
            'group' => 'Electronic',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);
        DB::table('genres')->insert([
            'name' => 'Techno',
            'group' => 'Electronic',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

    }
}
