<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrivilegeSeeder::class);
        $this->call(ZoneSeeder::class);     
        $this->call(UserTypeSeeder::class);
        $this->call(PrivilegeZoneSeeder::class);
        $this->call(UserSeeder::class);
   
    }
}
