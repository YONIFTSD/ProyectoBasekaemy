<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_user_type' => 1,
            'name' => 'Yonathan William',
            'last_name' => 'Mamani Calisaya',
            'phone' => '928872148',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'state' => 1,
        ]);

        // DB::table('users')->insert([
        //     'id_user_type' => 1,
        //     'email' => 'yonathan@gmail.com',
        //     'password' => Hash::make('123'),
        //     'nombre' => 'yonathan william',
        //     'apellido' => 'Mamani calisaya',
        //     'api_token' => str_random(60),
        //     'estado' => 1,
        // ]);
        
        //
    }
}
