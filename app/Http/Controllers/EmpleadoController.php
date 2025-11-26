<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listado['empleados']= empleado::paginate(1);
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
        $validacion = [
            'Nombres'=>'required|string|max:90',
            'PrimerApel'   => 'required|string|max:50',
            'SegundoApel'=> 'nullable|string|max:50',
            'Correo'=> 'required|email|max:100',
            'Foto'=> 'required|image|mimes:jpg,jpeg,png|max:2048'
        ];

        $msj = [
            'required'=>'El :attribute es requerido',
            'Foto.required' => 'La Foto es requerida'
        ];
        $this->validate($request,$validacion,$msj);
        $datosEmpleado = request()->except('_token');
        if($request->hasfile('Foto')){
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje','Registro ingresado con exito.');
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
        $validacion = [
            'Nombres'=>'required|string|max:90',
            'PrimerApel'   => 'required|string|max:50',
            'SegundoApel'=> 'nullable|string|max:50',
            'Correo'=> 'required|email|max:100'
        ];

        $msj = [
            'required'=>'El :attribute es requerido'
        ];
        if($request->hasFile('Foto')){ 
           $validacion= ['Foto'=> 'required|image|mimes:jpg,jpeg,png|max:2048'];
           $msj = ['Foto.required' => 'La Foto es requerida'];
        }
        $this->validate($request,$validacion,$msj);
  
        $datos = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        empleado::where('id','=',$id)->update($datos);
        $empleado = empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            empleado::destroy($id);
        }
        return redirect('empleado')->with('mensaje','Registro eliminado exitosamente.');   
        //
    }
}
