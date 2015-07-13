<!DOCTYPE html>
@extends('layout')

@section('title') Autentificacion @stop

@section('content')
    
    <h2> Iniciar Sesion </h2>
     {{ Form::open(array('url' => '/login')) }}
     <div class="panel panel-default ">
        <div class="panel-body  " >

            
                <div class="form-group ">
                    
                   
                    {{ Form::text('username',null,array('placeholder' => 'usuario','class'=>'form-control'))}}
                </div>
                         
                <div class="form-group ">
                    
                  
                    {{ Form::password('password',array('placeholder' => 'contraseña','class'=>'form-control'))}}
                </div>
                 <div class="form-group">
                            <label>
                                Recordar contraseña
                                {{ Form::checkbox('remember_me', true) }}
                            </label>
                </div>
                <p>
                    @if (Session::has('error_login'))
                    <span class="error">Usuario o contraseña incorrectos.</span>
                    @endif
                </p>
                     
           
            {{ Form::button('Enviar',array('type'=>'submit','class'=>'btn btn-primary')) }}
            {{ Form::close()}}
        </div>
    </div>

     


   <!--  <div class="panel panel-default">
                <div class="panel-body">
                    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                    @if(Session::has('mensaje_error'))
                        <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                    @endif
                    {{ Form::open(array('url' => '/login')) }}
                        <legend>Iniciar sesión</legend>
                        <div class="form-group ">
                    
                            {{ Form::label('nombres','Nombres')}}
                            {{ Form::text('username',null,array('placeholder' => 'nombres','class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contraseña', 'Contraseña') }}
                            {{ Form::password('password', array('class' => 'form-control')); }}
                        </div>
                        <div class="checkbox">
                            <label>
                                Recordar contraseña
                                {{ Form::checkbox('rememberme', true) }}
                            </label>
                        </div>
                        {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
     </div> -->

@stop 