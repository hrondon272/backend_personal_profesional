<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProfesionController extends Controller
{
    public function load(){
        $profesiones = DB::select('SELECT id, nombre FROM profesion');
        echo json_encode(['response' => $profesiones]);
    }
}
