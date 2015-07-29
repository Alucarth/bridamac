@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h4>Exportar Libro de Ventas</h4>
          </div>
        </div>
    </div>

    <div class="panel-body">
        {{ Former::open('exportar/libro_ventas')->method('post')->addClass('col-md-10 col-md-offset-1')->rules(array(
              'date' => 'required',      
          )); }}

        <div class="row" style="min-height:20px">
          <div class="col-md-6">

            {{ Former::text('date')->label('Fecha')
               ->data_date_format('mm/yyyy') }}   

          </div>
          <div class="col-md-3">
            {{ Former::actions()->large_primary_submit('exportar en Excel') }}

          </div>
          <div class="col-md-3">

            <input type="submit" name="login" value="Exportar en CSV" class="btn btn-info">

          </div>
        </div>

    {{ Former::close() }}
  
  </div>
</div>


<script type="text/javascript">

    $('#date').datepicker({
      viewMode: "months", 
      minViewMode: "months",
      orientation: "top auto"
    });

    function onSaveClick() {
      submitAction('save');
    }

    function submitAction(value) {

    $('#action').val(value);
    $('#submitButton').click();   
    }

</script>

@stop