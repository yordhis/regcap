<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** 
         * Los permisos son los modulos del sistema 
         * es decir que si creas un nuevo modulo debes agregarlo 
         * aqui para crear ese permiso y asignarlo en el 
         * @var RolPermisoSeeder
         * 
         * y correr de nuevo el seed para que funcine
         */
        $permisos = [
            "panel",
            "users",
            "registros",
            "reportes"
        ];

        foreach ($permisos as $key => $value) {
            $permiso = new Permiso();
            $permiso->nombre = $value;
            $permiso->save();
        }

    }
}
