@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-6">
        <h4>Actualización de Productos en la Factura</h4>
      </div>
    </div>
  </div>

  <div class="panel-body">

    {{ Former::open()->addClass('warn-on-exit') }}

    {{ Former::populateField('update_products', intval($account->update_products)) }}

    <div class="row">

      <div class="col-md-12">

        {{ Former::checkbox('update_products')->label('&nbsp;')->text('Cuando se emita una factura se actualizará automáticamente  el concepto y costo de los productos') }}

        <center class="buttons">

          <button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar Cambios </button>

        </center>

      </div>
    </div>

    {{ Former::close() }}

  </div>
</div>

@stop