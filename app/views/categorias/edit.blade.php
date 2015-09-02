@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                @if ($category)
                    <h4>Editar Categoría</h4>
                @else
                    <h4>Nueva Categoría</h4>
                @endif
            </div>
        </div>
    </div>

    <div class="panel-body">

    {{ Former::open($url)->addClass('col-md-8 col-md-offset-2 warn-on-exit')->rules(array( 
        'name' => 'required|match:/[a-zA-Z. ]+/',
    )); }}

    	<div class="row">
    		<div class="col-md-12">
                <legend>Categoría</legend>
                {{-- {{ Former::legend('Categoría') }} --}}
                
                {{ Former::text('name')->label('Nombre') }}
                
    		</div>

    	</div>

        <center class="buttons">

            <a href="{{ url('categorias') }}" class="btn btn-default"> Cancelar </a>
            <button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

        </center>

        {{ Former::close() }}

    </div>
</div>

@stop
