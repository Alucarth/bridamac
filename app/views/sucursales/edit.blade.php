@extends('layout')


@section('title') Gestion de Sucursal @stop
@section('head') 
  <style type="text/css">

      .panel-default > .panel-heading-custom {
background: #404040; color: #fff; }

  </style>
@stop

@section('body')
  


  
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('')->method($method)->rules(array( 
        'branch_name' => 'required',
        'branch_type_id' => 'required',
        'address1' => 'required',
        'work_phone' => 'required|Numeric|match:/[0-9.-]+/|min:7',
        'address2' => 'required',
        'city' => 'required',
        'economic_activity' => 'required',
        'state' => 'required',
        'deadline' => 'required|after:2015-12-23',
        'number_process' => 'required|match:/[0-9]+/|min:8',
        'number_autho' => 'required|match:/[0-9]+/|min:10',  
        'key_dosage' => 'required'
    )) }}

      <p></p>

      
      <div class="panel panel-default">
       
        <div class="panel-heading panel-heading-custom">
          
          <h3 style="text-align: center; margin:0 auto 0 auto;">Creacion de Sucursal</h3>
        </div>
        <div class="panel-body"> 
          <hr>
          
          <div class="row">
            <div class="col-md-10 col-mm-offset-2">
            {{ Former::password('code')->label('Llave')->placeholder('Ingrese Código proporcionado') }}
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
            {{ Former::legend('Datos de la Empresa') }}
            {{ Former::text('nit')->label('NIT (*)')->title('Solo se acepta Números') }}
            {{ Former::text('name')->label('EMPRESA (*)') }}
            {{ Former::text('domain')->label('Dominio (*)') }}
            </div>
            <div class="col-md-6">
            {{ Former::legend('Datos de Ingreso') }}
            {{ Former::text('username')->label('Usuario (*)')->placeholder('Nombre de Usuario') }}
            {{ Former::password('password')->label('contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}      
            </div>  
       
          </div>

      <p><center>
        {{Former::large_primary_submit('Continuar')}}                    
    </center>
      </p>

         {{ Former::close() }}
   

      </div>
       <div class="panel-footer">IPX Server 2015</div>
    </div>
    
@stop 
