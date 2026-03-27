<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserTableSeeder::class]);
        $this->call([InitialDatabaseSeeder::class]);
        $this->call([EmailSystemSeeder::class]);  
        $this->call([Emailnotificationtemplatesseeder::class]);
    }
}
