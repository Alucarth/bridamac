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
    <div class="row">

      <div class="col-md-12">
        {{ Former::populateField('update_products', intval($account->update_products)) }}

        {{ Former::checkbox('update_products')->label('actualización Automática')
                    ->text('Cuando se emita una factura, automáticamente <b>actualizará el concepto y costo de los productos</b>') }}

        <center class="buttons">

          <button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar Cambios </button>

        </center>

      </div>
    </div>

    {{ Former::close() }}

  </div>
</div>

@stop