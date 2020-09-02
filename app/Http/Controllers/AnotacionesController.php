<?php

namespace App\Http\Controllers;

use App\Anotaciones;
use App\Clientes;
use Illuminate\Http\Request;

class AnotacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Anotaciones= Anotaciones::orderBy('id','DESC')->paginate(5);
        return view('Anotaciones.index', compact('Anotaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        
        return view('Anotaciones.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Anotaciones = request()->except('_token');
        
        Anotaciones::insert($Anotaciones);

        return redirect('Anotaciones')->with('Mensaje','Anotacion creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anotaciones  $anotaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Anotaciones $anotaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anotaciones  $anotaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anotacion = Anotaciones::findOrFail($id);
        $clientes = Clientes::all();

        return view('Anotaciones.edit', compact('anotacion'),compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anotaciones  $anotaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosAnotaciones = request()->except('_token','_method');
        Anotaciones::Where('id','=',$id)->update($datosAnotaciones);

        return redirect('Anotaciones')->with('Mensaje','Anotacion Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anotaciones  $anotaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anotaciones::destroy($id);

        return redirect('Anotaciones')->with('Mensaje','Anotacion Eliminada');
    }
}
