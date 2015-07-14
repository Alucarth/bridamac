<!DOCTYPE html>
@extends('layout')

@section('title') Autentificacion @stop

@section('head')


<style type="text/css">
        body {
          padding-top: 40px;
          padding-bottom: 40px;
        }
      .modal-header {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
       }
      .modal-header h4 {
        margin:0;
      }
      .modal-header img {

      }
      .form-signin {
          max-width: 400px;
          margin: 50px  auto !important;
        background: #fff;
      }
      p.link a {
        font-size: 11px;
      }
      .form-signin .inner {
        padding: 20px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
          }
        .form-signin .checkbox {
          font-weight: normal;
        }
        .form-signin .form-control {
          margin-bottom: 17px !important;
        }
        .form-signin .form-control:focus {
          z-index: 2;
        }
      .titlefv {
        float: right;
      }

  </style>

@stop

@section('body')
<div class="container">
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
</div>
@stop