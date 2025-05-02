<?php

namespace App\Http\Controllers;

use App\Models\DataDev;
use App\Models\DataStatic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $respuesta = DataDev::$respuesta;
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

        // return $states;
        // return $cities;
        // return $parishes;
        return view('welcome', compact('states', 'cities', 'parishes', 'respuesta'));
    }
}
