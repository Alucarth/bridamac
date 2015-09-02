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

      {{-- <p>{{Session::has('error')?Session::get('error')}}</p> --}}
      
      <div class="col-md-11">  
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
        @endif
        <div class="panel panel-default">
         
          <div class="panel-heading panel-heading-custom">
            <img style="display:block;margin:0 auto 0 auto;" src="{{ asset('images/icon-login.png') }}" />
           
          </div>
            <div class="panel-body" > 
              <div class="col-sm-12"> 
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span>
                    
                    <input type="text" name="name" class="form-control" placeholder="Razon Social de la Empresa" aria-describedby="sizing-addon2"  title="Ingrese la razon social de su empresa">
                  </div>
              </div> 
                  <p></p>
              <div class="col-sm-10" align-inside> 
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
                    <input type="text" id="nit" name="nit" class="form-control" placeholder="NIT de la Empresa" aria-describedby="sizing-addon2"  title="Ingrese el NIT de su empresa">
                  </div>
              </div>
                  <p></p>
                <div class="col-sm-12"> 
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                    {{-- <input type="text" name="email" class="form-control" placeholder="Correo Electronico" aria-describedby="sizing-addon2"  pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" title="Ingrese un correo electronico valido"> --}}
                    <input type="text" name="email" class="form-control" placeholder="Correo Electronico" aria-describedby="sizing-addon2" title="Ingrese un correo electronico valido">
                  </div>
                </div>
                  <p></p>
                <div class="col-sm-12"> 
                  <div class="input-group">
                    <span class="input-group-addon"  id="basic-addon1">http://</span>
                      <input type="text" name="domain" class="form-control"  aria-describedby="basic-addon1" >
                    <span class="input-group-addon">.facturavirtual.com.bo</span>
                  </div> 
     
                 <p><center>
                 <button type="submit" class="btn btn-success">Registrar  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
                   
                  </center>
                    </p>
                </div> 
                  </center> 
            </div>

            <div class="panel-footer">IPX Server 2015</div>

      </div>
    </div>
    {{ Form::close() }}
@stop 
