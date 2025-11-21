<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listado['empleados']= empleado::paginate(5);
        return view('empleado.index', $listado);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("empleado.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        #$datosEmpleado=request()->all();
        $datosEmpleado=request()->except('_token');
        if($request->hasfile('Foto')){
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = empleado::findOrFail($id);
        return view('empleado.update', compact('empleado'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = request()->except(['_token','_method']);
        empleado::where('id','=',$id)->update($datos);
        $empleado = empleado::findOrFail($id);
        return view('empleado.update', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        empleado::destroy($id);
        return redirect('empleado.index');   
        //
    }
}
