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
            'first_name' => 'Rob',
            'last_name' => 'Baartwijk',
            'stage_name' => 'Towelmaster',
            'email' => 'rob.baartwijk@gmail.com',
            'street' => 'Kerkstraat',
            'street_number' => '1',
            'zip' => '1234AB',
            'city' => 'Amsterdam',
            'state' => 'Noord-Holland',
            'country' => 'Netherlands',
            'phone' => '0612345678',
            'website' => 'https://www.towelmaster.com',
            'email_notification_all' => 0,
            'email_notification_acts' => 1,
            'email_notification_vacancies' => 1,
            'email_notification_availablemusicians' => 0,
            'email_notification_rehearsalrooms' => 1,
            'email_notification_venues' => 0,
            'email_notification_agencies' => 0,
            'email_notification_newsletter' => 1,
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

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Test Admin',
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'stage_name' => 'Administrator',
            'email' => 'admin@bandmate.online',
            'street' => 'Kerkstraat',
            'street_number' => '1',
            'zip' => '1234AB',
            'city' => 'Amsterdam',
            'state' => 'Noord-Holland',
            'country' => 'Netherlands',
            'phone' => '0612345678',
            'website' => 'https://www.admin.com',
            'email_notification_all' => 0,
            'email_notification_acts' => 1,
            'email_notification_vacancies' => 1,
            'email_notification_availablemusicians' => 0,
            'email_notification_rehearsalrooms' => 1,
            'email_notification_venues' => 0,
            'email_notification_agencies' => 0,
            'email_notification_newsletter' => 1,
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => Hash::make('Admin99'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory(180)->create([]);

    }
}
