<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 
         * Se generan los usuarios por defecto al sistema 
         * que seria:
         * @var ROOT
         * @var ADMINISTRADOR
         * 
         * Según la cantidad de roles se genere se generan los usuarios para el sistema
         */

        $roles = Role::all();

        foreach ($roles as $key => $rol) {
            $newUser = new User();
            $newUser->nombre = $rol->nombre;
            $newUser->rol = $rol->id;
            $newUser->email = "@" . $rol->nombre;
            $newUser->password = Hash::make(12345678);
            $newUser->save();
        }

    }
}
