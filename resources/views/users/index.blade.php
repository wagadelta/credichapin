@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Usuarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('users.create') !!}">Agregar Nuevo</a>
        </div>

        <div class="row">
            @if($users->isEmpty())
                <div class="well text-center">No Users found.</div>
            @else
                <table class="table">
                    <thead>
                        <th>Usuario</th>
                        <th>Identificacion /<br> (otra id)</th>
            			<th>Nombres</th>
            			<th>Apellidos</th>
            			<th>Email</th>
            			<th>Telefonos</th>
            			<th>Foto</th>
            			<th>Rol</th>
            			<th>Correlativos<br> Cobro/Entrega</th>
            			<th>Supervisado por:</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($users as $user)
                    <?php
                    switch($user->id_rol){
                        case 3: // cobrador
                            $icon = '<i class="fa fa-money"></i>';
                        break; // supervisor
                        case 2:
                            $icon = '<i class="fa fa-search-plus"></i>';
                        break;
                        case 1: //administrator
                            $icon = '<i class="fa fa-key"></i>';
                        break;
                        default:
                            $icon = '<i class="fa fa-check-circle"></i>';
                    }
                    ?>
                    <tr>
                    <td>{!! $user->usuario !!}</td>
					<td>{!! $user->identificacion !!}<br>/{!! $user->otra_identificacion !!}</td>
					<td>{!! $user->nombres !!}</td>
					<td>{!! $user->apellidos !!}</td>
					<td>{!! $user->email !!}</td>
					<td>{!! $user->telefonos !!}</td>
					<td>{!! $user->foto !!}</td>
					<td>{!!$icon!!}-{!! $user->Rol->descripcion !!}</td>
					<td>{!! $user->correlativo_recibo_cobro !!} / {!! $user->correlativo_recibo_entrega !!}</td>
					<td>{!! $user->supervisorName($user->id_supervisor) !!}</td>
					        <td>
                                <a href="{!! route('users.edit', [$user->id]) !!}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{!! route('users.delete', [$user->id]) !!}" onclick="return confirm('Está seguro de eliminar éste registro - Users?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection