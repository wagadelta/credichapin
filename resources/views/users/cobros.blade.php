@extends('app')

@section('content')
    <div class="container">

        @include('flash::message')
<div class="row">
             <div class="pricing-table pricing-three-column row">
        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-bronze">
                <h3>Usuario</h3>
                <select class="form-control" id="searchUser">
                    <option value="1">Usuario 1</option>
                    <option value="2">Usuario 2</option>
                    <option value="3">Usuario 3</option>
                </select>
                <input type="hidden" id="idUser" value="{!! $idUser !!}">
            </div>
        </div>
        
        <div class="plan col-sm-4 col-lg-4">
          <div class="plan-name-bronze">
            <h3>Fecha</h3>
                <div class="form-group">
                    <div class="input-group date" id="divSearch">
                      <input type="text" class="form-control" id="searchDate" value="{!! $fechaPago !!}">
                          <span class="input-group-addon">
                              <i class="glyphicon glyphicon-th"></i>
                          </span>
                    </div>
                </div>
          </div>
        </div>
        
        <div class="plan col-sm-4 col-lg-4">
            <h3><i class="fa fa-search"></i></h3>
          <div class="plan-name-bronze" name="Search">
                <a href="#" class="btn btn-sm btn-info btn-flat pull-left" id="doSearch"><h4> Buscar</h4></a>
          </div>
        </div>
    </div>
    </div>
<hr>
        <div class="row">
            @if (!count($cobros) )
                <div class="well text-center">No Hay cobros para este dia.</div>
            @else
            <table class="table table-striped">
                    <thead>
                        <th>Fecha Pago</th>
                        <th>Id Contrato</th>
            			<th>Id Usuario</th>
            			<th>Recibo / Aviso</th>
            			<th>Monto x Cuota</th>
                    </thead>
                    <tbody>
                     <?php $total_pagado = 0 ;?>
                    @foreach($cobros as $cobro)
                    <?php  $imprimeCuota = true;?>
                    <tr>
                        <td>{!! $cobro->fecha_pago !!}</td>
                        <td><a href='/contratos/{!! $cobro->id_contrato !!}'>{!! $cobro->id_contrato !!}</a></td>
    					<td>{!! $cobro->id_usuario !!}</td>
    					<td><?php
    					        if ($cobro->no_recibo==0){
    					                echo ' <i class="fa fa-exclamation-triangle"></i> AVISO ';
    					                $imprimeCuota = false;
    					            }else
    					            { 
    					                echo $cobro->no_recibo;
    					            }
    					    ?>
    					</td>
    					<?php //dd($cobro->contrato());?>
    					<td align="right">
    					    <strong>
    					    <?php 
    					    if($imprimeCuota) 
    					    {
    					        echo 'Q.'. number_format( $cobro->contrato->valor_cuota, 2, '.', ','); 
    					    }else{
    					        echo 'Q. 0.00'; 
    					    }
    					            
    					     ?>
    					    </strong>
    					</td>
                    </tr>
                        
                        
                       
                        <?php 
    					    if($imprimeCuota) 
    					    {
    					         $total_pagado = $total_pagado + $cobro->contrato->valor_cuota ;
    					        
    					    }
    					    
    					     ?>
                        
                        
                        
                    @endforeach
                    <tr>
                    <td></td>
					<td></td>

					<td colspan="3" align="right"><h2>Total cobrado:</h2>
					<div class="btn btn-lg btn-warning">
					    <h3>
					        <?php echo 'Q. '. number_format( $total_pagado, 2, '.', ','); ?> &nbsp;&nbsp; <i class="fa fa-money"></i>
					    </h3>
					</div></td>
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

@section('script')
<script>
     jQuery(document).ready(function($) {
         
          $('#searchUser').val($('#idUser').val());
          $('#divSearch').datepicker({
            format: "yyyy-mm-dd",
            language: "es",
            calendarWeeks: true,
            toggleActive: true,
            autoclose: true
        });


        $('#doSearch').on('click', function(e){
            var searchUrl = 'http://'+document.location.hostname + "/users/"+$('#searchUser').val()+"/cobros/fecha_pago/"+$('#searchDate').val();
            //alert(searchUrl);
            window.location.href = searchUrl;
        });// onchange
    });// jQuery
</script>
@endsection