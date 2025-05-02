<?php

namespace App\Http\Controllers;

use App\Exports\ExportVoto;
use App\Models\DataDev;
use App\Models\Helpers;
use App\Models\Voto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public $data;
    public function __construct()
    {
        $this->data = new DataDev;
    }

    public function index(Request $request)
    {
        try {
            
            $votos = [];
    
            if ($request->filtro) {
                switch (true) {
                    case $request->codigo_sede > 0 && $request->codigo_programa > 0 && $request->codigo_carrera > 0  :
                        $votos = Voto::where('codigo_programa', $request->codigo_programa)
                        ->Where('codigo_sede', $request->codigo_sede)
                        ->Where('codigo_carrera', $request->codigo_carrera)
                        ->paginate(12);
                        break;

                    case $request->codigo_sede > 0 && $request->codigo_programa > 0  :
                        $votos = Voto::where('codigo_programa', $request->codigo_programa)
                        ->Where('codigo_sede', $request->codigo_sede)
                        ->paginate(12);
                        break;
                    case $request->codigo_carrera > 0 :
                        $votos = Voto::where('codigo_programa', $request->codigo_carrera)
                        ->paginate(12);
                        break;
                    
                    default:
                        $mensaje = "Seleccione correctamente los parametros para filtrar";
                        $estatus = Response::HTTP_NOT_FOUND;
                        return back()->with(compact('mensaje', 'estatus'));
                        break;
                }
               
            } else {
                $votos = Voto::paginate(12);
            }
    
            /** Variable global para los alertas */
            $programas = DB::connection('mysql_second')->table('programas')->get();
            $sedes = DB::connection('mysql_second')->table('sede')
                ->select(
                    'CodSede as codigo_sede',
                    'Sede as nombre_sede',
                    'Tipo as tipo_sede',
                    'TipoSede as tipo_oferta_sede',
                    'Zona as zona_sede',
                    'oestado as estado_sede',
                    'Municipio as municipio_sede',
                    'oparroquia as parroquia_sede',
                    'osector as sector_sede',
                    'Arse as arse',
                )
                ->get();
    
        
            $carreras = DB::connection('mysql_second')->table('carreras')->get();
            
            $respuesta =  $this->data->respuesta;
            
            return view('admin.reportes.index', compact('votos', 'sedes', 'programas', 'carreras', 'respuesta', 'request'));
        } catch (\Throwable $th) {
            $mensaje = Helpers::getMensajeError($th, ", ¡Error interno al intentar consultar datos para los reportes!");
            $estatus = Response::HTTP_INTERNAL_SERVER_ERROR;
            return back()->with(compact('mensaje', 'estatus'));
        }
    }


    public function store()
    {
        try {
            return Excel::download(new ExportVoto, "reporte_votos.xlsx");
            
        } catch (\Throwable $th) {
            $mensaje = Helpers::getMensajeError($th, ", ¡Error interno al intentar exportar datos para los reportes!");
            $estatus = Response::HTTP_INTERNAL_SERVER_ERROR;
            return back()->with(compact('mensaje', 'estatus'));
        }
    }
}
