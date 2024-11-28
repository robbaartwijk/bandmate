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
        // $date = Carbon::now()->modify('-2 year');
        // $createdDate = clone($date);

        // DB::table('acts')->insert([
        //     'name' => 'Solid Air',
        //     'number_of_members' => 2,
        //     'genre_id' => 1,
        //     'rehearsal_room' => 1,
        //     'website' => 'http://www.solidair.com',
        //     'active' => 1,
        //     'description' => 'Solid Air are a four-piece band from London. They play a mix of rock, blues and soul music.',
        //     'email' => 'rob.baartwijk@gmail.com',
        //     'phone' => '020 123 4567',

        //     'created_at' => $createdDate,
        //     'updated_at' => $createdDate
        // ]);

        \App\Models\Act::factory(100)->create([]);

    }
}
