@extends('header')
@section('title') FACTURA @stop
@section('head') @stop
@section('encabezado') FACTURA @stop
@section('encabezado_descripcion') Nueva Factura @stop 
@section('nivel') <li><a href="#"><i class="icon-star"></i> Factura</a></li> @stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">FACTURA</h3>
  </div>
  <div class="box-body">
    <!-- Date range -->
    
    <div class="col-md-12">

      <div class="form-group col-md-4">
      <label>Cliente:</label>
        <div id="bloodhound" >          
           <select id="client" name="client" onchange="addValuesClient(this)" class="form-control js-data-example-ajax">
                <option value="null" ></option>           
            </select>
        </div>  
    </div>
    <div class="col-md-2"></div>
    <div class="form-group col-md-4">
      <label>Fecha de Emisi&oacute;n:</label>
      <div class="input-group">              
        <input class="form-control pull-right" id="reservation" type="text">
        <div class="input-group-addon">          
        <i class="fa fa-calendar"></i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Date and time range -->
    
    <div class="form-group col-md-2">
      <label>Descuento</label>
      <div class="input-group">
        
        <input class="form-control pull-right" id="reservationtime" type="text">
        <div class="input-group-addon">
          <i class="fa">%</i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->
    
    </div>
    <div class="col-md-12">
        <div class="form-group col-md-4">
        </div>  
        <div class="col-md-2"></div>
        <div class="form-group col-md-4">
        <label>Fecha de Vencimiento:</label>
      <div class="input-group">              
        <input class="form-control pull-right" id="reservation" type="text">
        <div class="input-group-addon">          
        <i class="fa fa-calendar"></i>
        </div>
      </div><!-- /.input group -->
        </div>
        <div class="form-group col-md-2">

        </div>

        <!--botones de adicion de productos y servicios-->
        <div class="col-md-12">
        <div class="col-xs-2"></div>
        <div  class="col-xs-2"> <button  type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#create_product">Crear Producto</button> </div>
        <div  class="col-xs-2"> <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#create_service">Crear Servicio</button> </div>
        </div>
        <!--ELEMENTOS DE LA FACTURA-->
        <div class="form-group col-md-12">
                        
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th class="col-md-2">C&oacute;digo</th>
                      <th class="col-md-4">Concepto</th>
                      <th class="col-md-2">Costo Unitario</th>
                      <th class="col-md-2">Cantidad</th>
                      <th class="col-md-1">Subtotal</th>
                      <th class="col-md-1">X</th>
                    </tr>
                    <tr>
                      <td>
                        <input class="form-control" id="tags">
                      </td>
                      <td >
                        <input class="form-control" id="tags">
                      </td>
                      <td>                      
                      <input class="form-control" id="tags">
                      </td>
                      <td>
                        <input class="form-control" id="tags">
                        </td>
                      <td>
                        0
                      </td>
                      <td>
                      <div for="inputError">
                        <span class="badge bg-red">x</span>
                        </div>
                      </td>
                    </tr>                                                          
                  </tbody></table>
                </div><!-- /.box-body -->                                
        </div>
        <!--Nota para el cliente y, descuentos y total-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea class="form-control" placeholder="Nota para el CLiente" rows="2"></textarea>
          </div>
          <div class="col-md-3"></div>
          <b>Total Bs. </b>


        </div>
        <!--terminos de facturacion y el total a pagar-->
        <div class="form-group col-md-12">
          <div class="col-md-6">
          <textarea class="form-control" placeholder="Términos de Facturación" rows="2"></textarea>
          </div>
          <div class="col-md-3"></div>
          <b>Total a pagar Bs.</b>
        </div>
        <div class="form-group"></div>
        <!--BOTONES DE ENVIO-->
        <div class="col-md-12 form-group">
        <button  class="btn btn-large btn-success openbutton" type="submit" name="mail" id="mail" onclick="sendMail()">Emitir Factura</button>   
        <button class="btn btn-large btn-success openbutton" type="submit" name="mail" id="mail" onclick="sendMail()">Enviar Por Correo</button>   
        </div>

    </div>

  </div><!-- /.box-body -->
</div><!-- /.box -->

<!-- iCheck -->
@stop