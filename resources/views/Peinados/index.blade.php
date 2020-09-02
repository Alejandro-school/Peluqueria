@extends('layouts.app')

@section('content')

<div class="container">

    <a href="{{ url ('Peinados/create') }}" class="btn btn-success">Agregar Peinado</a>
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
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($Peinados as $peinado)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$peinado->Nombre}}</td>
                <td>{{$peinado->Precio}}</td>
                <td>

                    <a href="{{url('/Peinados/'.$peinado->id.'/edit')}}" class="btn btn-warning">Editar</a>

                    <form action="{{url('/Peinados/'.$peinado->id) }}" method="post" class="d-inline">

                        {{ csrf_field() }}

                        {{method_field ('DELETE') }}

                        <button type="submit" class="btn btn-danger">Borrar</button>

                    </form>



                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $Peinados->render() !!}
</div>

@endsection