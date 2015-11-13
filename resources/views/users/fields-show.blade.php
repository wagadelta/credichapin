<!--- identificacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('identificacion', 'Identificación:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- otraIdentificacion Nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Otra-identificacion', 'Otra Identificación:') !!}
    {!! Form::text('otra_identificacion', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Contacto email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- apellidos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- telefonos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefonos', 'Teléfonos:') !!}
    {!! Form::text('telefonos', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- foto Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto', 'Fotografía:') !!}
    {!! Form::text('foto', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- correlativo_recibo_cobro Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('correlativo_recibo_cobro', 'Correlativo (Cobros):') !!}
    {!! Form::text('correlativo_recibo_cobro', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- correlativo_recibo_entrega Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('correlativo_recibo_entrega', 'Correlativo (Entregas):') !!}
    {!! Form::text('correlativo_recibo_entrega', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>


<!--- usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario', 'Nombre de usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Id Rol Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Rol', 'Rol:') !!}
    {!! Form::text('id_rol', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Password  Clave Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Clave', 'Clave:') !!} Mínimo 6 caracteres.
    {!! Form::password('password', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Password  Confirmation ConfirmarClave Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Confirmar Clave', 'Confirmar Clave:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Supervisado por Field --->
<div class="form-group col-sm-6 col-lg-4" id="idsupervisor">
    {!! Form::label('supervisado-por', 'Supervisado por:') !!}
    {!! Form::text('id_supervisor',null , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>