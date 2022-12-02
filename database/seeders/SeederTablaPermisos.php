<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla de los roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            // //tabla articulos
            'ver-articulo',
            // 'crear-articulo',
            'editar-articulo',
            'borrar-articulo',

            //tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //vistas
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);

        }
    }
}
