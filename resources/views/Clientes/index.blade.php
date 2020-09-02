@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h5>Busqueda de Clientes
                    {{ Form::open(['route' => 'Clientes','method' => 'GET', 'class' => 'form-inline pull-right']) }}
                    <div class="form-group">
                        {{ Form::text('Nombre', null, ['class'=> 'form-control','placeholder'=> 'Nombre'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::text('Telefono', null, ['class'=> 'form-control','placeholder'=> 'Telefono'])}}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                            </svg>
                        </button>
                    </div>

                    {{ Form::close() }}
                </h5>
            </div>
        </div>
    </div>

    <a href="{{ url ('Clientes/create') }}" class="btn btn-success">Agregar Cliente</a>
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
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($Clientes as $cliente)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cliente->Nombre}} {{$cliente->Apellidos}}</td>
                <td>{{$cliente->Telefono}}</td>
                <td>

                    <a href="{{url('/Clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning">Editar</a>

                    <a href="{{ route ('Clientes.show', $cliente->id) }}" class="btn btn-info">Ficha Cliente</a>

                    <form action="{{url('/Clientes/'.$cliente->id) }}" method="post" class="d-inline">

                        {{ csrf_field() }}

                        {{method_field ('DELETE') }}

                        <button type="submit" class="btn btn-danger">Borrar</button>

                    </form>



                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $Clientes->render() !!}
</div>

@endsection