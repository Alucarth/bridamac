@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h4>Importar Clientes</h4>
          </div>
        </div>
    </div>

    <div class="panel-body">

        {{ Former::open_for_files('importar/mapa_clientes')->method('post')->addClass('col-md-10 col-md-offset-1')->rules(array(
              'file' => 'required',      
          )); }}


        <div class="row" style="min-height:20px">
          <div class="col-md-6">
          {{ Former::file('file')->label('') }}
          </div>
          <div class="col-md-6">
          {{ Former::actions()->large_primary_submit('Subir Archivo') }}
          </div>
        </div>

      {{ Former::close() }}

    </div>
</div>
@stop