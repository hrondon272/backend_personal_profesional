<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PersonalProfesionalController extends Controller
{
    public function load(){
        $personalProfesional = DB::select('SELECT u.id, CONCAT(u.nombre, " ", u.apellido) as "nombre_completo", u.cedula, u.fecha_nacimiento, p.nombre as "profesion", u.direccion, u.municipio, u.telefono, u.sexo, v.nombre as "nombre_vehiculo", v.marca as "marca", v.anio as "año" 
                                    FROM users u 
                                    INNER JOIN usuario_profesion up ON u.id = up.user_id 
                                    INNER JOIN profesion p ON up.profesion_id = p.id
                                    INNER JOIN usuario_vehiculo uv ON u.id = uv.user_id
                                    INNER JOIN vehiculo v ON uv.vehiculo_id = v.id');
        echo json_encode(['response' => $personalProfesional]);
    }
    
    public function store(Request $request){
        $dataPersonalProfesional = $request->all();
        $nombre = $dataPersonalProfesional["nombre"];
        $apellido = $dataPersonalProfesional["apellido"];
        $cedula = $dataPersonalProfesional["cedula"];
        $fecha_nacimiento = $dataPersonalProfesional["fecha_nacimiento"];
        $profesion = $dataPersonalProfesional["profesion"];
        $direccion = $dataPersonalProfesional["direccion"];
        $municipio = $dataPersonalProfesional["municipio"];
        $telefono = $dataPersonalProfesional["telefono"];
        $sexo = $dataPersonalProfesional["sexo"];
        $nombre_vehiculo = $dataPersonalProfesional["nombre_vehiculo"];
        $marca = $dataPersonalProfesional["marca"];
        $anio = $dataPersonalProfesional["año"];

        $fecha_nacimiento = date('Y-m-d H:i:s', strtotime($fecha_nacimiento));

        $dataProfesion = DB::select('select id from profesion where nombre = ?', [$profesion]);
        $idProfesion = $dataProfesion[0]->id;

        $dataVehiculo = DB::select('select id from vehiculo where nombre = ? and marca = ? and anio = ?', [$nombre_vehiculo, $marca, $anio]);
        $idVehiculo = $dataVehiculo[0]->id;

        try {
            $idNuevoUsuario = DB::table('users')->insertGetId([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'fecha_nacimiento' => $fecha_nacimiento,
                'direccion' => $direccion,
                'municipio' => $municipio,
                'telefono' => $telefono,
                'sexo' => $sexo,
                'created_at' => now()
            ]);
    
            DB::table('usuario_profesion')->insert([
                'user_id' => $idNuevoUsuario,
                'profesion_id' => $idProfesion,
            ]);
            
            DB::table('usuario_vehiculo')->insert([
                'user_id' => $idNuevoUsuario,
                'vehiculo_id' => $idVehiculo
            ]);
            echo json_encode(['response' => true]);
        } catch (Exception $e) {
            echo json_encode(['response' => $e->getMessage()]);
        }
    }

    public function update(Request $request){
        $dataPersonalProfesional = $request->all();
        $idUsuario = $dataPersonalProfesional["id"];
        $nombre = $dataPersonalProfesional["nombre"];
        $apellido = $dataPersonalProfesional["apellido"];
        $cedula = $dataPersonalProfesional["cedula"];
        $fecha_nacimiento = $dataPersonalProfesional["fecha_nacimiento"];
        $profesion = $dataPersonalProfesional["profesion"];
        $direccion = $dataPersonalProfesional["direccion"];
        $municipio = $dataPersonalProfesional["municipio"];
        $telefono = $dataPersonalProfesional["telefono"];
        $sexo = $dataPersonalProfesional["sexo"];
        $nombre_vehiculo = $dataPersonalProfesional["nombre_vehiculo"];
        $marca = $dataPersonalProfesional["marca"];
        $anio = $dataPersonalProfesional["año"];

        $fecha_nacimiento = date('Y-m-d H:i:s', strtotime($fecha_nacimiento));
        
        $personalProfesional = DB::select('SELECT u.id, p.nombre as "profesion", v.nombre as "nombre_vehiculo", v.marca as "marca", v.anio as "año" 
                                    FROM users u 
                                    INNER JOIN usuario_profesion up ON u.id = up.user_id 
                                    INNER JOIN profesion p ON up.profesion_id = p.id
                                    INNER JOIN usuario_vehiculo uv ON u.id = uv.user_id
                                    INNER JOIN vehiculo v ON uv.vehiculo_id = v.id
                                    WHERE u.id = '.$idUsuario.'');

        $nombreVehiculoTemporal = $personalProfesional[0]->nombre_vehiculo;
        $marcaTemporal = $personalProfesional[0]->marca;
        $anioTemporal = $personalProfesional[0]->año;
        $profesionTemporal = $personalProfesional[0]->profesion;

        // Las siguientes consultas es con los datos temporales anteriores

        $dataProfesionTemporal = DB::select('select id from profesion where nombre = ?', [$profesionTemporal]);
        $idProfesionTemporal = $dataProfesionTemporal[0]->id;

        $dataVehiculoTemporal = DB::select('select id from vehiculo where nombre = ? and marca = ? and anio = ?', [$nombreVehiculoTemporal, $marcaTemporal, $anioTemporal]);
        $idVehiculoTemporal = $dataVehiculoTemporal[0]->id;

        // Las siguientes consultas son con los datos del request

        $dataProfesionActualizada = DB::select('select id from profesion where nombre = ?', [$profesion]);
        $idProfesionActualizada = $dataProfesionActualizada[0]->id;

        $dataVehiculoActualizado = DB::select('select id from vehiculo where nombre = ? and marca = ? and anio = ?', [$nombre_vehiculo, $marca, $anio]);
        $idVehiculoActualizado = $dataVehiculoActualizado[0]->id;

        try {
            DB::table('users')->where('id', $idUsuario)->update([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'fecha_nacimiento' => $fecha_nacimiento,
                'direccion' => $direccion,
                'municipio' => $municipio,
                'telefono' => $telefono,
                'sexo' => $sexo,
                'updated_at' => now()
            ]);
    
            DB::table('usuario_profesion')->where('user_id', $idUsuario)->where('profesion_id', $idProfesionTemporal)->update([
                'profesion_id' => $idProfesionActualizada,
            ]);
            
            DB::table('usuario_vehiculo')->where('user_id', $idUsuario)->where('vehiculo_id', $idVehiculoTemporal)->update([
                'vehiculo_id' => $idVehiculoActualizado
            ]);
            echo json_encode(['response' => true]);
        } catch (Exception $e) {
            echo json_encode(['response' => $e->getMessage()]);
        }
    }

    public function delete(Request $request){
        $dataPersonalProfesional = $request->all();
        $idUsuario = $dataPersonalProfesional["id"];
        $profesion = $dataPersonalProfesional["profesion"];
        $nombre_vehiculo = $dataPersonalProfesional["nombre_vehiculo"];
        $marca = $dataPersonalProfesional["marca"];
        $anio = $dataPersonalProfesional["año"];

        $dataProfesion = DB::select('select id from profesion where nombre = ?', [$profesion]);
        $idProfesion = $dataProfesion[0]->id;

        $dataVehiculo = DB::select('select id from vehiculo where nombre = ? and marca = ? and anio = ?', [$nombre_vehiculo, $marca, $anio]);
        $idVehiculo = $dataVehiculo[0]->id;

        try {
            DB::table('usuario_profesion')->where('user_id', $idUsuario)->where('profesion_id', $idProfesion)->delete();            
            DB::table('usuario_vehiculo')->where('user_id', $idUsuario)->where('vehiculo_id', $idVehiculo)->delete();    
            DB::table('users')->where('id', $idUsuario)->delete();
    
            echo json_encode(['response' => true]);
        } catch (Exception $e) {
            echo json_encode(['response' => $e->getMessage()]);
        }
    }
}
