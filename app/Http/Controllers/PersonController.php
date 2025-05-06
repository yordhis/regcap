<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\DataDev;
use App\Models\DataStatic;
use App\Models\Person;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PersonController extends Controller
{

    public function index(Request $request)
    {
        $respuesta = DataDev::$respuesta;
        $people = Person::where('dni', $request->filtro)
            ->orWhere('name', 'like', '%' . $request->filtro . '%')
            ->orWhere('last_name', 'like', '%' . $request->filtro . '%')
            ->paginate(12);

        $dataStatic = DataStatic::$data;
        $states = []; // estados
        $cities = []; // municipios
        $parishes = []; // parroquias

        foreach ($dataStatic as $key => $state) {
            array_push($states, $key);

            foreach ($state['municipios'] as $key2 => $value2) {
                array_push($cities, $key2);

                foreach ($value2['parroquias'] as $key3 => $value3) {
                    array_push($parishes, $value3);
                }
            }
        }

        return view('admin.personas.index', compact('respuesta', 'people', 'request', 'states', 'cities', 'parishes'));
    }

    public function exportPDF(Request $request)
    {
        $data = [];
        $dataStatic = DataStatic::$data;
        $municipiosStatic = []; // municipios
        $parroquiasStatic = []; // parroquias

        /** Obtenemos los municipios y parroquias */
        foreach ($dataStatic['Barinas']['municipios'] as $key2 => $value2) {
            array_push($municipiosStatic, $key2);

            foreach ($value2['parroquias'] as $key3 => $value3) {
                array_push($parroquiasStatic, $value3);
            }
        }

        /** Obtenemos los datos estadisticos */
        foreach ($dataStatic['Barinas']['municipios'] as $municipio => $parroquias) {
            $data['estadisticas'][$municipio] = [];
            foreach ($parroquias['parroquias'] as $parroquia) {
                array_push($data['estadisticas'][$municipio], [
                    $parroquia => Person::where('parish', $parroquia)
                        ->where('city', $municipio)
                        ->count(),
                ]);
            }
        }

        /** Obtenemos los datos de las personas por municipio y parroquia */
        foreach ($dataStatic['Barinas']['municipios'] as $municipio => $parroquias) {
            foreach ($parroquias['parroquias'] as $parroquia) {
                $data['personas'][$municipio][$parroquia] = Person::where('parish', $parroquia)
                    ->where('city', $municipio)
                    ->get();
            }
        }

        /** Establesemos la hora y fecha al generar el reporte */
        $data['info'] = [
            "hora" => date("H:i:s a"),
            "fecha" => date("d-m-Y"),
        ];


        /** Generamos el pdf */
        $pdf = Pdf::loadView('admin.pdf.reporte', [
            'estadisticas' => $data['estadisticas'],
            'info' => $data['info'],
            'personas' => $data['personas'],
            'municipios' => $municipiosStatic,
            'parroquias' => $parroquiasStatic,
            'contador' => 0,
        ]);
        return $pdf->stream('reporte.pdf');
    }

    public function storePublic(StorePersonRequest $request)
    {
        try {
            Person::create($request->all());
            return back()->with([
                "mensaje" => "Registro creado con exito",
                "estatus" => 200,
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "mensaje" => "Error: " . $th->getMessage(),
                "estatus" => 400,
            ]);
        }
    }
    public function store(StorePersonRequest $request)
    {
        try {
            Person::create($request->all());
            return back()->with([
                "message" => "Registro creado con exito",
                "status" => "success",
                "title" => "Error"
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Error: " . $th->getMessage(),
                "status" => "danger",
                "title" => "Error"
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $person = Person::findOrFail($id);
            $person->update($request->all());
            return back()->with([
                "message" => "Registro actualizado con exito",
                "status" => "success",
                "title" => "Exito"
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Error: " . $th->getMessage(),
                "status" => "danger",
                "title" => "Error"
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $person = Person::findOrFail($id);
            $person->delete();
            return back()->with([
                "message" => "Registro eliminado con exito",
                "status" => "success",
                "title" => "Exito"
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                "message" => "Error: " . $th->getMessage(),
                "status" => "danger",
                "title" => "Error"
            ]);
        }
    }
}
