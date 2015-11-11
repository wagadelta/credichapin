@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Contratos - estado ({!!$estado!!})</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('contratos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($contratos->isEmpty())
                <div class="well text-center">No Contratos found.</div>
            @else
            <?php echo $contratos->render(); ?>
                <table class="table">
                    <thead>
						<th>Monto</th>
						<th>No Cuotas</th>
						<th>Valor Cuota</th>
						<th>Perido Cobro</th>
						<th>Solicitado Por</th>
						<th>Solicitado En</th>
						<th>Aprobado Por</th>
						<th>Aprobado En</th>
						<th>Entrado Por</th>
						<th>Entregado En</th>
						<th>Entregado Gps</th>
						<th>Pagado En</th>
						<th>Juridico Por</th>
						<th>Juridico En</th>
						<th>Incobrable Por</th>
						<th>Incobrable En</th>
						<th>Rechazado Por</th>
						<th>Rechazado En</th>
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
						<th>Estado</th>
						<th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($contratos as $contrato)
                    <tr>
						<td>{!! $contrato->monto !!}</td>
						<td>{!! $contrato->no_cuotas !!}</td>
						<td>{!! $contrato->valor_cuota !!}</td>
						<td>{!! $contrato->periodo_cobro !!}</td>
						<td>{!! $contrato->solicitado_por !!}</td>
						<td>{!! $contrato->solicitado_en !!}</td>
						<td>{!! $contrato->aprobado_por !!}</td>
						<td>{!! $contrato->aprobado_en !!}</td>
						<td>{!! $contrato->entrado_por !!}</td>
						<td>{!! $contrato->entregado_en !!}</td>
						<td>{!! $contrato->entregado_gps !!}</td>
						<td>{!! $contrato->pagado_en !!}</td>
						<td>{!! $contrato->juridico_por !!}</td>
						<td>{!! $contrato->juridico_en !!}</td>
						<td>{!! $contrato->incobrable_por !!}</td>
						<td>{!! $contrato->incobrable_en !!}</td>
						<td>{!! $contrato->rechazado_por !!}</td>
						<td>{!! $contrato->rechazado_en !!}</td>
						<td>{!! $contrato->nombres !!}</td>
						<td>{!! $contrato->apellidos !!}</td>
						<td>{!! $contrato->identificacion !!}</td>
						<td>{!! $contrato->otra_identificacion !!}</td>
						<td>{!! $contrato->fecha_nacimiento !!}</td>
						<td>{!! $contrato->domicilio !!}</td>
						<td>{!! $contrato->telefonos !!}</td>
						<td>{!! $contrato->foto !!}</td>
						<td>{!! $contrato->foto_dpi !!}</td>
						<td>{!! $contrato->conyugue_nombre !!}</td>
						<td>{!! $contrato->conyugue_lugar_trabajo !!}</td>
						<td>{!! $contrato->conyugue_telefono !!}</td>
						<td>{!! $contrato->estado !!}</td>
                        <td>
                            <a href="{!! route('contratos.edit', [$contrato->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('contratos.delete', [$contrato->id]) !!}" onclick="return confirm('Are you sure wants to delete this Contratos?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <?php echo $contratos->render(); ?>
            @endif
        </div>
    </div>
@endsection