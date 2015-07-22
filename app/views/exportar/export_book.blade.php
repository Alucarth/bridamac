@extends('header')
<p>&nbsp;</p>
@section('content')



{{Former::framework('TwitterBootstrap3')}}

{{ Former::open('exportar/libro_ventas')->method('post')->addClass('col-md-10 col-md-offset-1')->rules(array(
      'date' => 'required',      
  )); }}

{{ Former::legend('exportar Libro de Ventas') }}

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


<script type="text/javascript">

    $('#date').datepicker({
      viewMode: "months", 
      minViewMode: "months",
      language: "es"
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