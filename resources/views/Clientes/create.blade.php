@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ url('/Clientes') }}" method="post">

        {{ csrf_field() }}
        <div class="form-group">

            <label for="Nombre">{{'Nombre'}}</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Introduce el nombre" required>
            </br>

            <label for="Apellido">{{'Apellido'}}</label>
            <input type="text" name="Apellidos" id="Apellido" class="form-control" placeholder="Introduce el apellido" required>
            </br>

            <label for="Telefono">{{'Teléfono'}}</label>
            <input type="text" name="Telefono" id="Telefono" class="form-control" placeholder="Introduce el teléfono" required>


            <input type="submit" class="btn btn-primary" value="Agregar">
            <a href="{{ url ('Clientes') }}" class="btn btn-warning">Atras</a>

        </div>

    </form>

</div>

@endsection