<?php

namespace App\Exports;

use App\Models\Voto;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportVoto implements FromCollection, ShouldAutoSize
{

    public function collection()
    {
        $votos = Voto::all();
        $programas = DB::connection('mysql_second')->table('programas')->get();
        $sedes = DB::connection('mysql_second')->table('sede')->get();
        $carreras = DB::connection('mysql_second')->table('carreras')->get();

        $reportSedes = [];
        $reportProgramas = [];
        $reportCarreras = [];

        $votoPorSede = [];
        foreach ($sedes as $sede) {
            $votoPorSede = Voto::where('codigo_sede', $sede->CodSede)->get();
            if (count($votoPorSede)) {
                array_push($reportSedes, [
                    "sede" => $votoPorSede[0]->nombre_sede,
                    "total" => $votoPorSede->count()
                ]);
            }
        }

        $votoPorPrograma = [];
        foreach ($programas as $programa) {
            $votoPorPrograma = Voto::where('codigo_programa', $programa->codPrograma)->get();
            if (count($votoPorPrograma)) {
                array_push($reportProgramas, [
                    "sede" => $votoPorPrograma[0]->nombre_sede,
                    "programa" => $votoPorPrograma[0]->nombre_programa,
                    "total" => $votoPorPrograma->count()
                ]);
            }
        }

        $votoPorCarrera =[];
        foreach ($carreras as $carrera) {
            $votoPorCarrera = Voto::where('codigo_carrera', $carrera->CodCar)->get();
            if (count($votoPorCarrera)) {
                array_push($reportCarreras, [
                    "sede" => $votoPorCarrera[0]->nombre_sede,
                    "programa" => $votoPorCarrera[0]->nombre_programa,
                    "carrera" => $votoPorCarrera[0]->nombre_carrera,
                    "total" => $votoPorCarrera->count()
                ]);
            }
        }



        return new Collection([
            ['REPORTE GENERAL DEL SISTEMA CNEU'],
            ['---------------------------------'],
            
            ['VOTOS POR SEDES'],
            ['---------------------------------'],
            ['SEDES', 'VOTOS'],
            $reportSedes,
            ['---------------------------------'],
            
            ['VOTOS POR PROGRAMAS'],
            ['---------------------------------'],
            ['SEDES', 'PROGRAMAS', 'VOTOS'],
            $reportProgramas,
            ['---------------------------------'],
            
            ['VOTOS POR CARRERAS'],
            ['---------------------------------'],
            ['SEDES', 'PROGRAMAS', 'CARRERAS', 'VOTOS'],
            $reportCarreras,
            ['---------------------------------'],

            ['TOTAL GENERAL DE VOTOS:', $votos->count()]

        ]);
    }
}
