<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrivilegeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 1,
            'id_zone' => 2,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 2,
            'id_zone' => 2,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 3,
            'id_zone' => 2,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 4,
            'id_zone' => 2,
            'state' => 1,
        ]);

        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 5,
            'id_zone' => 2,
            'state' => 1,
        ]);

        


        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 1,
            'id_zone' => 3,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 2,
            'id_zone' => 3,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 3,
            'id_zone' => 3,
            'state' => 1,
        ]);
        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 4,
            'id_zone' => 3,
            'state' => 1,
        ]);

        DB::table('privilege_zone')->insert([
            'id_user_type' => 1,
            'id_privilege' => 5,
            'id_zone' => 3,
            'state' => 1,
        ]);
    }
}
