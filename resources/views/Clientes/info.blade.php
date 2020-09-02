@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
        <thead class="thead-light">
            <tr class="text-center">
                <th>Descripcion</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td>{{$datos->Nombre}} {{$datos->Apellidos}}</td>
                <td>{{$datos->Telefono}}</td>
            </tr>

        </tbody>
    </table>


    <table class="table">
        <thead class="thead-light">
            <tr class="text-center">
                <th>Fecha</th>
                <th>Anotaciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($Anotaciones as $anotacion)
            <tr>
                <td>{{date('d-m-Y', strtotime($anotacion->created_at))}}</td>
                <td>{{$anotacion->Descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    </br>

    @endsection