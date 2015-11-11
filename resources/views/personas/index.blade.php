@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Personas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('personas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($personas->isEmpty())
                <div class="well text-center">No Personas found.</div>
            @else
                {!! $personas->render() !!}
                <table class="table">
                    <thead>
                    <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Identificacion</th>
                    <th>Otra Identificacion</th>
                    <th>Fecha Nacimiento</th>
                    <th>Domicilio</th>
                    <th>Telefonos</th>
                    <th>Foto</th>
                    <th>Foto Dpi</th>
                    <th>Conyugue Nombre</th>
                    <th>Conyugue Lugar Trabajo</th>
                    <th>Conyugue Telefono</th>
                    <th>Id. Contrato</th>
                    <th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($personas as $persona)
                        <tr>
                            <td>{!! $persona->nombres !!}</td>
                            <td>{!! $persona->apellidos !!}</td>
                            <td>{!! $persona->identificacion !!}</td>
                            <td>{!! $persona->otra_identificacion !!}</td>
                            <td>{!! $persona->fecha_nacimiento !!}</td>
                            <td>{!! $persona->domicilio !!}</td>
                            <td>{!! $persona->telefonos !!}</td>
                            <td>{!! $persona->foto !!}</td>
                            <td>{!! $persona->foto_dpi !!}</td>
                            <td>{!! $persona->conyugue_nombre !!}</td>
                            <td>{!! $persona->conyugue_lugar_trabajo !!}</td>
                            <td>{!! $persona->conyugue_telefono !!}</td>
                            <td>{!! $persona->id_contrato !!}</td>
                            <td>{!! $persona->estado !!}</td>
                            <td>
                                <a href="{!! route('personas.edit', [$persona->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('personas.delete', [$persona->id]) !!}" onclick="return confirm('Are you sure wants to delete this Personas?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {!! $personas->render() !!}
            @endif
        </div>
    </div>
@endsection