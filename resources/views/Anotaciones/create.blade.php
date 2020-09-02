@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ url('/Anotaciones') }}" method="post">

        {{ csrf_field() }}
        <div class="form-group">

            <label for="Descripcion">{{'Descripcion'}}</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
            </br>

            <label for="id_client">Cliente</label>
            <select name="id_client" class="form-control" required>
                <option value="">-- Escoje una cliente --</option>
                @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->Nombre}} {{$cliente->Apellidos}}</option>
                @endforeach
            </select>
            </br>

            <input type="submit" class="btn btn-primary" value="Agregar">
            <a href="{{ url ('Clientes') }}" class="btn btn-warning">Atras</a>

        </div>

    </form>

</div>

@endsection