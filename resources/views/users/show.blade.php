@extends('app')

@section('content')
<div class="container">

    @include('common.errors')
    <h1>Usuario - {!! $userId !!}</h1>
        @include('users.fields-show')

</div>
@endsection