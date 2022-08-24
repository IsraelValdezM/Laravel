<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return response([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);
    }

    public function datos()
    {
        $alumnos = Alumno::all();

        $alumnosMasculinos = Alumno::where('genero', 'masculino')->get();
        $alumnosFemeninos = Alumno::where('genero', 'femenino')->get();
        $alumnosBecados = Alumno::where('becado', 'si')->get();
        $alumnosNoBecados = Alumno::where('becado', 'no')->get();
        $alumnosMatutinos = Alumno::where('horario', 'matutino')->get();
        $alumnosVespertinos = Alumno::where('horario', 'vespertino')->get();
        $alumnosReprobados = Alumno::whereBetween('calificacion_prepa', [1,5])->get();
        $alumnosAprobados = Alumno::whereBetween('calificacion_prepa', [6,10])->get();
        $alumnosConPDS = Alumno::where('problemas_de_salud', 'si')->get();
        $alumnosSinPDS = Alumno::where('problemas_de_salud', 'no')->get();

        return response()->json([
            'message1' => 'Alumnos masculinos',
            'total_data1' => count($alumnosMasculinos),
            'data1' => $alumnosMasculinos,

            'message2' => 'Alumnos femeninos',
            'total_data2' => count($alumnosFemeninos),
            'data2' => $alumnosFemeninos,

            'message3' => 'Alumnos becados',
            'total_data3' => count($alumnosBecados),
            'data3' => $alumnosBecados,

            'message4' => 'Alumnos no becados',
            'total_data4' => count($alumnosNoBecados),
            'data4' => $alumnosNoBecados,

            'message5' => 'Alumnos horario matutino',
            'total_data5' => count($alumnosMatutinos),
            'data5' => $alumnosMatutinos,

            'message6' => 'Alumnos horario vespertino',
            'total_data6' => count($alumnosVespertinos),
            'data6' => $alumnosVespertinos,

            'message7' => 'Alumnos aprobados prepa',
            'total_data7' => count($alumnosAprobados),
            'data7' => $alumnosAprobados,

            'message8' => 'Alumnos no aprobados prepa',
            'total_data8' => count($alumnosReprobados),
            'data8' => $alumnosReprobados,

            'message9' => 'Alumnos problema de salud',
            'total_data9' => count($alumnosConPDS),
            'data9' => $alumnosConPDS,

            'message10' => 'Alumnos sin problema de salud',
            'total_data10' => count($alumnosSinPDS),
            'data10' => $alumnosSinPDS
        ], 200);
    }

    public function create(Request $request)
    {
        $data = $this->rules($request);
        Alumno::create($data);
        return response([
            'message' => 'Se creo con exito el alumno'
        ], 201);
    }

    public function show($id)
    {
        $alumno = Alumno::where('id', $id)->first();
        return response($alumno, 200);
    }

    public function update($id,Request $request)
    {
        $data = $this->rules($request);
        Alumno::find($id)->fill($data)->save();
        return response([
            'message' => 'Se modifico con exito el alumno'
        ], 200);
    }

    public function delete($id)
    {
        Alumno::find($id)->delete();
        return response([
            'message' => 'Se elimino con exito el alumno'
        ], 200);
    }

    protected function rules($request)
    {
        return $request->validate([
            'nombre'=>'required|string',
            'edad'=>'required|string',
            'genero'=>'required',
            'carrera'=>'nullable',
            'ednia_indigena'=>'required|string',
            'horario'=>'required',
            'calificacion_prepa'=>'required',
            'becado'=>'required|string',
            'problemas_de_salud'=>'required|string'
        ]);
    }
}
