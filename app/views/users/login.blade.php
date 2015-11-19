<!DOCTYPE html>
@extends('layout')

@section('title') Autentificación @stop

@section('head')


<style type="text/css">

body {
  padding-top: 40px;
  padding-bottom: 40px;
}
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 20px 20px 20px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    max-width: 75%;
    display:block;
    margin:0 auto 0 auto;
    background-color: #f7f7f7;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}

  </style>

@stop

@section('body')


<div class="container">

     {{ Form::open(array('url' => '/login')) }}

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
       		<img class="profile-img" src="{{ asset('images/login-factura-virtual.png') }}" />

                    {{-- <div class="col-md-2"></div> --}}
                {{-- <div class="form-group "> --}}
                <p></p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                    <input type="text" name="username" placeholder="Usuario" class="form-control" required/>
                </div>
                <p></p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>{{-- ion-android-lock --}}
                    <input type="password" name="password" placeholder="Contraseña" class="form-control" required/>
                </div>
                <p></p>
                {{-- fa fa-unlock-alt --}}
                    {{-- {{ Form::text('username',null,array('placeholder' => 'usuario','class'=>'form-control'))}} --}}
                     {{-- </div> --}}
                    {{-- <div class="form-group "> --}}
                    {{-- {{ Form::password('password',array('placeholder' => 'contraseña','class'=>'form-control'))}} --}}
                    {{-- </div> --}}


                <!-- <label class="checkbox pull-left"> -->
                    <!-- Recordar contraseña -->
                    {{-- Form::checkbox('remember_me', true) --}}
                <!-- </label> -->
                <p>
                    @if (Session::has('error_login'))
                    <span class="error">{{Session::get('error_login')}}</span>
                    @endif
                </p>
                <center>
                {{ Form::button('Enviar',array('type'=>'submit','class'=>'btn btn-primary')) }}
                </center>
            </div>
        </div>
    </div>

    {{ Form::close()}}

</div>

@stop