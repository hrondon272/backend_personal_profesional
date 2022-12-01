<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class VehiculoController extends Controller
{
    public function load(){
        $vehiculos = DB::select('SELECT CONCAT(nombre, " - ", marca, " - ", anio) as "vehiculo" FROM vehiculo');
        echo json_encode(['response' => $vehiculos]);
    }
}
