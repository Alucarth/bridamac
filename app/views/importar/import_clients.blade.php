@extends('header')
<p>&nbsp;</p>
@section('content')

{{Former::framework('TwitterBootstrap3')}}

{{ Former::open_for_files('importar/mapa_clientes')->method('post')->addClass('col-md-10 col-md-offset-1')->rules(array(
      'file' => 'required',      
  )); }}

{{ Former::legend('Importar Clientes') }}

  <div class="row" style="min-height:20px">
    <div class="col-md-6">
    {{ Former::file('file')->label('') }}
    </div>
    <div class="col-md-6">
    {{ Former::actions()->large_primary_submit('Subir Archivo') }}
    </div>
  </div>


{{ Former::close() }}

@stop