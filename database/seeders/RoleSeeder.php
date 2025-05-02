<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Aqui se agregan los roles a manejar en la app para los usuarios
         * 
         */
        $roles = [
            "ROOT",
            "ADMINISTRADOR",
            "USUARIO",
        ];
    
        foreach ($roles as $rol) {
            $newRol = new Role();
            $newRol->nombre = $rol;
            $newRol->save();
        }
    }
}
