<!--- Nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!--- Apellidos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!--- Identificacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('identificacion', 'Identificacion:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Otra Identificacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('otra_identificacion', 'Otra Identificacion:') !!}
    {!! Form::text('otra_identificacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Fecha Nacimiento Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control']) !!}
</div>

<!--- Domicilio Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    {!! Form::text('domicilio', null, ['class' => 'form-control']) !!}
</div>

<!--- Telefonos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefonos', 'Telefonos:') !!}
    {!! Form::text('telefonos', null, ['class' => 'form-control']) !!}
</div>

<!--- Foto Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
</div>

<!--- Foto Dpi Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto_dpi', 'Foto Dpi:') !!}
    {!! Form::text('foto_dpi', null, ['class' => 'form-control']) !!}
</div>

<!--- Conyugue Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conyugue_nombre', 'Conyugue Nombre:') !!}
    {!! Form::text('conyugue_nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Conyugue Lugar Trabajo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conyugue_lugar_trabajo', 'Conyugue Lugar Trabajo:') !!}
    {!! Form::text('conyugue_lugar_trabajo', null, ['class' => 'form-control']) !!}
</div>

<!--- Conyugue Telefono Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conyugue_telefono', 'Conyugue Telefono:') !!}
    {!! Form::text('conyugue_telefono', null, ['class' => 'form-control']) !!}
</div>

<!--- Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!--- id_contrato Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_contrato', 'Id Contrato:') !!}
    {!! Form::text('id_contrato', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
