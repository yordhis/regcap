<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\RolPermiso;
use Illuminate\Database\Seeder;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        $permisosDeRoles = [
            "ROOT" => [
                "panel",
                "users",
                "registros",
                "reportes"
            ],
            "ADMINISTRADOR" => [
                "panel",
                "users",
                "registros",
                "reportes"
            ],
            "USUARIO" => [
                "panel",
                "users",
                "registros",
                "reportes"
            ]
        ];

        foreach ($roles as $key => $rol) {
            foreach ($permisosDeRoles as $key => $permisoRol) {
                if ($key == $rol->nombre) {
                    foreach ($permisoRol as $key => $permiso) {
                        $newRolPermiso = new RolPermiso();
                        $newRolPermiso->id_rol = $rol->id;
                        $newRolPermiso->id_permiso = Permiso::where('nombre', $permiso)->first()->id;
                        $newRolPermiso->save();
                    }
                }
            }
        }
    }
}
