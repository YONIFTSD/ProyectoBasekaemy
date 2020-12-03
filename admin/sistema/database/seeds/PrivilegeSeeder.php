<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege')->insert([
            'name' => 'listar',
            'state' => 1,
        ]);
        DB::table('privilege')->insert([
            'name' => 'agregar',
            'state' => 1,
        ]);
        DB::table('privilege')->insert([
            'name' => 'editar',
            'state' => 1,
        ]);
        DB::table('privilege')->insert([
            'name' => 'eliminar',
            'state' => 1,
        ]);
        DB::table('privilege')->insert([
            'name' => 'ver',
            'state' => 1,
        ]);
    }
}
