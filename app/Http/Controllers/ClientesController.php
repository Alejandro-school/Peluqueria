<?php

namespace App\Http\Controllers;

use App\Anotaciones;
use App\Clientes;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name   = $request->get('Nombre');
        $phone = $request->get('Telefono');


        $Clientes= Clientes::orderBy('id','DESC')
                    ->name($name)
                    ->phone($phone)
                    ->paginate(10);

        return view('Clientes.index',compact('Clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Clientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosClientes = request()->except('_token');

        Clientes::insert($datosClientes);
        
        return redirect('Clientes')->with('Mensaje','Cliente Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @param  \App\Anotaciones  $anotaciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Clientes::find($id);
        $datos2 ['Anotaciones'] = Anotaciones::where('id_client', '=', $id)->get();
                
        return view('Clientes.info',compact('datos'),$datos2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);

        return view('Clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosClientes = request()->except('_token','_method');
        Clientes::Where('id','=',$id)->update($datosClientes);

        return redirect('Clientes')->with('Mensaje','Cliente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);

        return redirect('Clientes')->with('Mensaje','Cliente Eliminado');
    }
}
