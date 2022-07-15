<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return response([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ]);
    }

    public function create(Request $request)
    {
        $data = $this->rules($request);
        Alumno::create($data);
        return response([
            'message'=>'se creo con exito el alumno'
        ], 201);
    }

    public function alumnosMasculinos()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('genero', 'masculino');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function alumnosFemeninos()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('genero', 'femenino');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function alumnosBecados()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('becado', 'si');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function alumnosSinBecas()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('becado', 'no');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function turnoMatutino()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('horario', 'matutino');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function turnoVespertino()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('horario', 'vespertino');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function aprobados()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('calificacion_prepa' >= 6);

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function reprobados()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('calificacion_prepa' <= 6);

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function problemasDeSalud()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('problemas_de_salud', 'si');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    public function sinProblemasDeSalud()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);

        $data = $alumnos->where('problemas_de_salud', 'no');

        return response()-json([
            'genero'=>count($data)
        ]);
    }

    protected function rules($request)
    {
        return $this->validate($request, [
            'nombre' => 'required|string',
            'edad' => 'required|string',
            'genero' => 'required',
            'carrera' => 'nullable',
            'ednia_indigena' => 'required|string',
            'horario' => 'required|string',
            'calificacion_prepa' => 'required|integer',
            'becado' => 'required|string',
            'problemas_de_salud' => 'required|string',
        ]);
    }
}
