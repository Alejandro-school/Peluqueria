@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ url('/Clientes/'.$cliente->id) }}" method="post">

        {{ csrf_field() }}

        {{method_field ('PATCH') }}
        <div class="form-group">

            <label for="Nombre">{{'Nombre'}}</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{$cliente->Nombre}}">
            </br>

            <label for="Apellido">{{'Apellido'}}</label>
            <input type="text" name="Apellidos" id="Apellido" class="form-control" value="{{$cliente->Apellidos}}">
            </br>

            <label for="Telefono">{{'Teléfono'}}</label>
            <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{$cliente->Telefono}}">


            </br>

            <input type="submit" class="btn btn-primary" value="Editar">
            <a href="{{ url ('Clientes') }}" class="btn btn-warning">Atras</a>

        </div>


    </form>

</div>

@endsection