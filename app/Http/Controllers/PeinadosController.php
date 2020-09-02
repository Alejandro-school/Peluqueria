<?php

namespace App\Http\Controllers;

use App\Peinados;
use Illuminate\Http\Request;

class PeinadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Peinados= Peinados::orderBy('id','DESC')->paginate(5);
        return view('Peinados.index', compact('Peinados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Peinados.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPeinado = request()->except('_token');

        Peinados::insert($datosPeinado);
        
        return redirect('Peinados')->with('Mensaje','Peinado Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peinados  $peinados
     * @return \Illuminate\Http\Response
     */
    public function show(Peinados $peinados)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peinados  $peinados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peinado = Peinados::findOrFail($id);

        return view('Peinados.edit', compact('peinado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peinados  $peinados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosPeinado = request()->except('_token','_method');
        Peinados::Where('id','=',$id)->update($datosPeinado);

        return redirect('Peinados')->with('Mensaje','Peinado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peinados  $peinados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peinados::destroy($id);

        return redirect('Peinados')->with('Mensaje','Peinado Eliminado');
    }
}
