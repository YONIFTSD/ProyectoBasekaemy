<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ZoneSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zone')->insert([
            'name' => 'Modulo Usuario',
            'module' => 'Usuario',
            'state' => 1,
        ]);
        DB::table('zone')->insert([
            'name' => 'Modulo Tipo de Usuario',
            'module' => 'TipoUsuario',
            'state' => 1,
        ]);

        DB::table('zone')->insert([
            'name' => 'Modulo Zona Privilegio',
            'module' => 'ZonaPrivilegio',
            'state' => 1,
        ]);
        DB::table('zone')->insert([
            'name' => 'Modulo Cliente',
            'module' => 'Cliente',
            'state' => 1,
        ]);
        DB::table('zone')->insert([
            'name' => 'Modulo Producto',
            'module' => 'Producto',
            'state' => 1,
        ]);
        DB::table('zone')->insert([
            'name' => 'Modulo Comprobante',
            'module' => 'Comprobante',
            'state' => 1,
        ]);
        DB::table('zone')->insert([
            'name' => 'Modulo Empresa',
            'module' => 'Empresa',
            'state' => 1,
        ]);

        DB::table('zone')->insert([
            'name' => 'Modulo Pedido',
            'module' => 'Pedido',
            'state' => 1,
        ]);

        DB::table('zone')->insert([
            'name' => 'Modulo Facturacion',
            'module' => 'Facturacion',
            'state' => 1,
        ]);
    }
}
