@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ url('/Peinados/'.$peinado->id) }}" method="post">

        {{ csrf_field() }}
        {{method_field ('PATCH') }}

        <div class="form-group">

            <label for="Nombre">{{'Nombre'}}</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Introduce el nombre" value="{{$peinado->Nombre}}" required>
            </br>

            <label for="Precio">{{'Precio'}}</label>
            <input type="text" name="Precio" id="Precio" class="form-control" placeholder="Introduce el precio" value="{{$peinado->Precio}}" required>
            </br>

            <input type="submit" class="btn btn-primary" value="Agregar">
            <a href="{{ url ('Peinados') }}" class="btn btn-warning">Atras</a>

        </div>

    </form>

</div>

@endsection