@extends('layouts.app')

@section('content')

<div class="container">

    <a href="{{ url ('Anotaciones/create') }}" class="btn btn-success">Agregar Anotacion</a>
    <br />
    <br />

    <table class="table">
        <div class="text-center">
            @if(Session::has('Mensaje'))
            {{
                Session::get('Mensaje')
            }}
            @endif
            <br />
            <br />
        </div>
        <thead class="thead-light">
            <tr class="text-center">
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($Anotaciones as $anotacion)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$anotacion->Descripcion}}</td>
                <td>

                    <a href="{{url('/Anotaciones/'.$anotacion->id.'/edit')}}" class="btn btn-warning">Editar</a>

                    <form action="{{url('/Anotaciones/'.$anotacion->id) }}" method="post" class="d-inline">

                        {{ csrf_field() }}

                        {{method_field ('DELETE') }}

                        <button type="submit" class="btn btn-danger">Borrar</button>

                    </form>



                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $Anotaciones->render() !!}
</div>

@endsection