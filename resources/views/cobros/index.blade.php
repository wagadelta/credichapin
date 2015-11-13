@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Cobros</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cobros.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($cobros->isEmpty())
                <div class="well text-center">No Cobros found.</div>
            @else
                {!! $cobros->render() !!}
                <table class="table">
                    <thead>
                    <th>Id Contrato</th>
			<th>Id Usuario</th>
			<th>Fecha Pago</th>
			<th>Cuotas A Pagar</th>
			<th>Cuotas Pagadas</th>
			<th>No Recibo</th>
			<th>No Aviso</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($cobros as $cobro)
                        <tr>
                    <td><a href='/contratos/{!! $cobro->id_contrato !!}'>{!! $cobro->id_contrato !!}</a></td>
					<td>{!! $cobro->id_usuario !!}</td>
					<td>{!! $cobro->fecha_pago !!}</td>
					<td>{!! $cobro->cuotas_a_pagar !!}</td>
					<td>{!! $cobro->cuotas_pagadas !!}</td>
					<td>{!! $cobro->no_recibo !!}</td>
					<td>{!! $cobro->no_aviso !!}</td>
					<td>{!! $cobro->estado !!}</td>
                            <td>
                                <a href="{!! route('cobros.edit', [$cobro->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('cobros.delete', [$cobro->id]) !!}" onclick="return confirm('Are you sure wants to delete this Cobros?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
             {!! $cobros->render() !!}
            @endif
        </div>
    </div>
@endsection