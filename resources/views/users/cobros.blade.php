@extends('app')

@section('content')
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Cobros para [ {!! $fechaPago !!}  ]</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cobros.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if (!count($cobros) )
                <div class="well text-center">No Cobros found.</div>
            @else
            <table class="table" border=1>
                    <thead>
                        <th>Usuario:</th>
                        <th>Fecha:</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="estado">
                                <option value="1">Usuario 1</option>
                                <option value="2">Usuario 2</option>
                                <option value="3">Usuario 3</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" name="bday">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/cobros">Consultar</a>
                        </td>
                    </tr>
                    </tbody>
            </table>
                <table class="table">
                    <thead>
                        <th>Id Contrato</th>
            			<th>Id Usuario</th>
            			<th>Fecha Pago</th>
            			<th>Cuotas A Pagar</th>
            			<th>Cuotas Pagadas</th>
            			<th>No Recibo/ No. Aviso</th>
            			<th>Monto x Cuota</th>
            			<th>Estado</th>
                    </thead>
                    <tbody>
                     <?php $total_pagado = 0 ;?>
                    @foreach($cobros as $cobro)
                    <?php // dd($cobro);?>
                    <tr>
                        <td>{!! $cobro->id_contrato !!}</td>
    					<td>{!! $cobro->id_usuario !!}</td>
    					<td>{!! $cobro->fecha_pago !!}</td>
    					<td>{!! $cobro->cuotas_a_pagar !!}</td>
    					<td>{!! $cobro->cuotas_pagadas !!}</td>
    					<td>{!! $cobro->no_recibo !!}/{!! $cobro->no_aviso !!}</td>
    					<?php //dd($cobro->contrato());?>
    					<td>valor x cuota $$</td>
    					<td>{!! $cobro->estado !!}</td>
                    </tr>
                        <?php $total_pagado = $total_pagado + $cobro->cuotas_pagadas ;?>
                    @endforeach
                    <tr>
                    <td></td>
					<td></td>
					<td></td>
					<td>Total cuotas cobrado:</td>
					<td><?php echo $total_pagado; ?></td>
					<td></td>
					<td></td>
					<td></td>
                    <td></td>
                        </tr>
                    </tbody>
                </table>

            @endif
        </div>
    </div>
@endsection