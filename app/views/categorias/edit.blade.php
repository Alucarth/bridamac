@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="row">

    {{ Former::open($url)->addClass('col-md-8 col-md-offset-2 warn-on-exit')->rules(array( 
        'name' => 'required|match:/[a-zA-Z. ]+/',
    )); }}

    @if ($category)

      {{ Former::populate($category) }}
      
    @endif

	<div class="row">
		<div class="col-md-12">

            {{ Former::legend('Categoría') }}

            {{ Former::text('name')->label('Nombre') }}
            
		</div>

	</div>
</div>

    <center class="buttons">

	<a href="{{ url('categorias') }}" class="btn btn-info" role="button">Cancelar</a>
	{{Former::submit('enviar')}}

	</center>

  {{ Former::close() }}

@stop