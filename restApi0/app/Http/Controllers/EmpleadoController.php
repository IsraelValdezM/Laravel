<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
       // $queryTelefono = $request->query('telefono');
       // $queryNombre = $request->query('nombre');
       // $queryEdad = $request->query('edad');
        #$empleados = Empleado::where('telefono', 'LIKE', '%' . $queryTelefono . '%')->get();
       // $empleados = Empleado::where('telefono', 'LIKE', '%' . $queryTelefono . '%')->get();
        //where('nombre', 'LIKE', '%' . $queryNombre . '%')->get();
        //where('edad', 'LIKE', '%' . $queryEdad . '%')->get();

        $empleados = Empleado::all();
        return $empleados;
    }

    public function create(Request $request)
    {

        $data = $this->validate($request, [
            'nombre'=>'required',
            'telefono'=>'required',
            'edad'=>'required',
            'genero' => 'required',
            'estatus' => 'required'
        ]);
        Empleado::create($data);
        return response([
            'message'=>'Se creo con exito el empleado'
        ],201);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        return response($empleado);
    }

    public function edit($id, Request $request)
    {
        $data = $this->validate($request, [
            'nombre'=>'required',
            'telefono'=>'required',
            'edad'=>'required',
            'genero' => 'required',
            'estatus' => 'required'
        ]);
        Empleado::find($id)->fill($data)->save();
        return response([
            'message' => 'Se modifico con exito el empleado'
        ], 200);
    }

    public function delete($id){
        Empleado::find($id)->delete();
        return response([
            'message'=>'Se elimino el empleado con exito'
        ], 200);
    }
}
