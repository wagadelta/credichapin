@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Contratos <?php if (isset($estado)) echo ' ( estado '.$estado.' )';?></h1>
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
						<th>Nombre</th>
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
						<td>{!! $contrato->apellidos !!}, {!! $contrato->nombres !!}</td>
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