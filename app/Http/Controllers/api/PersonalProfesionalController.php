<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PersonalProfesionalController extends Controller
{
    public function load(){
        $personalProfesional = DB::select('SELECT CONCAT(u.nombre, " ", u.apellido) as "nombre_completo", u.cedula, u.fecha_nacimiento, p.nombre as "profesion", u.direccion, u.municipio, u.telefono, u.sexo, v.nombre as "nombre_vehiculo", v.marca as "marca", v.anio as "año" 
                                    FROM users u 
                                    INNER JOIN usuario_profesion up ON u.id = up.user_id 
                                    INNER JOIN profesion p ON up.profesion_id = p.id
                                    INNER JOIN usuario_vehiculo uv ON u.id = uv.user_id
                                    INNER JOIN vehiculo v ON uv.vehiculo_id = v.id');
        echo json_encode(['response' => $personalProfesional]);
    }
}
