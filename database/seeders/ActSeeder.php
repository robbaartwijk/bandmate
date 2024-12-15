<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now()->modify('-2 year');
        $createdDate = clone($date);

        DB::table('acts')->insert([

            'user_id' => 1,
            'name' => 'Solid Air',
            'number_of_members' => 2,
            'genre_id' => 1,
            'rehearsal_room' => 1,
            'website' => 'http://www.solidair.com',
            'active' => 1,
            'description' => 'Solid Air are a four-piece band from London. They play a mix of rock, blues and soul music.',
            'email' => 'rob.baartwijk@gmail.com',
            'phone' => '020 123 4567',
            'facebook' => 'https://www.facebook.com/SolidAir',
            'instagram' => 'https://www.instagram.com/SolidAir',
            'twitter' => 'https://www.twitter.com/SolidAir',
            'youtube' => 'https://www.youtube.com/SolidAir',
            'spotify' => 'https://www.spotify.com/SolidAir',
            'soundcloud' => 'https://www.soundcloud.com/SolidAir',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);


        DB::table('acts')->insert([

            'user_id' => 2,
            'name' => 'AAA band',
            'number_of_members' => 5,
            'genre_id' => 5,
            'rehearsal_room' => 1,
            'website' => 'http://www.solidair.com',
            'active' => 1,
            'description' => 'Beat band in the fucking world!',
            'email' => 'AAAband@gmail.com',
            'phone' => '024 123 4567',
            'facebook' => 'https://www.facebook.com/AAABand',
            'instagram' => 'https://www.instagram.com/AAABand',
            'twitter' => 'https://www.twitter.com/AAABand',
            'youtube' => 'https://www.youtube.com/AAABand',
            'spotify' => 'https://www.spotify.com/AAABand',
            'soundcloud' => 'https://www.soundcloud.com/AAABand',
            'created_at' => $createdDate,
            'updated_at' => $createdDate
        ]);

        \App\Models\Act::factory(24)->create([]);

    }
}
