<?php

namespace App\Http\Middleware;

use App\Models\Permiso;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RolPermiso;
use Illuminate\Http\Response;

class ValidarRol 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->rol != 1 ){
            if( Auth::user()->rol ){
                $rolPermisos = RolPermiso::select('id_permiso')->where('id_rol', Auth::user()->rol )->get();
                $permisos = Permiso::all();
               
                
                $permisosDelRol=[];
                foreach ($rolPermisos as $key => $rolPermiso) {
                   foreach ($permisos as $key => $permiso) {
                    if($permiso->id == $rolPermiso->id_permiso) array_push($permisosDelRol, $permiso->nombre);
                   }
                }

                $path = explode('/',$request->path())[0];

                // var_dump(!in_array( $path , $permisosDelRol ) );
                // return;

                if( !in_array( $path , $permisosDelRol ) ){
                    return redirect()->route('admin.panel.index')->with([
                        "mensaje" => "No tiene autorización para acceder al modulo: ". $path ,
                        "estatus" => Response::HTTP_UNAUTHORIZED
                    ]);
                } 
            }
        }

        return $next($request);
    }
}
