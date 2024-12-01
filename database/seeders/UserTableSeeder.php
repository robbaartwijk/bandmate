<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Rob Baartwijk',
            'email' => 'rob.baartwijk@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => Hash::make('Towelmaster99'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Black User',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'is_admin' => 0,
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory(30)->create([]);

    }
}
