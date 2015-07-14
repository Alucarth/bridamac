@extends('header')

@section('title') Administracion @stop

@section('content')
	
	<h1>Administracion</h1>
	
	  	{{ Form::open(array('url' => 'get_started', 'id' => 'startForm')) }}
		{{ Form::hidden('guest_key') }}
		{{ Form::close() }}
		{{Former::framework('TwitterBootstrap3')}}
		
		{{Former::text('nombre')}}
		{{Former::text('nit')}}

		{{Former::submit('enviar')}}
		
		    
@stop