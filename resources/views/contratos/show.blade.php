@extends('app')

@section('content')
<div class="container">
    {!! Form::model($contratos, ['route' => ['contratos.update', $contratos->id], 'method' => 'patch']) !!}
        <h1> CONTRATO - {!! $idContrato !!} </h1>
        @include('contratos.fields-show')

    {!! Form::close() !!}
</div>
@endsection
