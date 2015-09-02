@extends('layout')


@section('title') Creacion de Cuenta @stop
@section('head') 
  <style type="text/css">

      .panel-default > .panel-heading-custom {
background: #404040; color: #fff; }

  </style>
@stop

@section('body')
  


  
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('cuentas/'.$cuenta->id)->method('put')->rules(array(
      'name' => 'required|min:3',
      'nit' => 'required|Numeric|min:5',
      
      
      )) }}

      <p></p>

      
      <div class="panel panel-default">
       
        <div class="panel-heading panel-heading-custom">
          <img style="display:block;margin:0 auto 0 auto;" src="{{ asset('images/icon-login.png') }}" />
          <h3 style="text-align: center; margin:0 auto 0 auto;">Editar Cuenta</h3>
        </div>
        <div class="panel-body"> 
          <hr>
          
        {{--   <div class="row">
            <div class="col-md-10 col-mm-offset-2">
            {{ Former::password('code')->label('Llave')->placeholder('Ingrese Código proporcionado') }}
            </div>
          </div>
 --}}
          <div class="row">
            <div class="col-md-6">
            {{Former::populate($cuenta)}} 
            <legend>Datos de la Empresa</legend>
            <!-- {{ Former::legend('Datos de la Empresa') }} -->
            {{ Former::text('nit')->label('NIT (*)')->title('Solo se acepta Números') }}
            {{ Former::text('name')->label('EMPRESA (*)') }}
            {{-- {{ Former::text('domain')->label('Dominio (*)') }} --}}
            </div>
           {{--  <div class="col-md-6">
            {{ Former::legend('Datos de Ingreso') }}
            {{ Former::text('username')->label('Usuario (*)')->placeholder('Nombre de Usuario') }}
            {{ Former::password('password')->label('contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}      
            </div>   --}}
       
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
