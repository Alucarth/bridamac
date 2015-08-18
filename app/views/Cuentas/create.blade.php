@extends('layout')


@section('title') Creacion de Cuenta @stop
@section('head') 
  <style type="text/css">

      .panel-default > .panel-heading-custom {
background: #404040; color: #fff; }

  </style>
@stop

@section('body')
  


  

      {{Form::open(array('url' => 'crear', 'method' => 'post'))}}

      <p></p>
      
      <div class="col-md-10">  
        <div class="panel panel-default">
         
          <div class="panel-heading panel-heading-custom">
            <img style="display:block;margin:0 auto 0 auto;" src="{{ asset('images/icon-login.png') }}" />
           
          </div>

            <div class="panel-body"> 
              
                  
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
                    <input type="text" name="name" class="form-control" placeholder="Nombre de la Empresa" aria-describedby="sizing-addon2" required title="Ingrese el nombre de su empresa">
                  </div>
                  <p></p>
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                    <input type="text" name="email" class="form-control" placeholder="Correo Electronico" aria-describedby="sizing-addon2" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" title="Ingrese un correo electronico valido">
                  </div>
                  
                

                   <p><center>
                 <button type="submit" class="btn btn-success">Registrar  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
                   
                  </center>
                    </p>

            </div>

            <div class="panel-footer">IPX Server 2015</div>
      </div>
    </div>
    {{ Form::close() }}
@stop 
