@extends('header')
@section('title')Nueva Sucursal @stop
  @section('head') @stop
@section('encabezado') SUCURSALES @stop
@section('encabezado_descripcion') Nueva Sucursal @stop 
@section('nivel') <li><a href="{{URL::to('sucursales')}}"><i class="glyphicon glyphicon-home"></i> Sucursales</a></li>
            <li class="active"> Nueva </li> @stop

@section('content')
  
 

  
  {{-- {{Former::framework('TwitterBootstrap3')}} --}}
      {{ Former::open('sucursales')->method('post')->rules(array( 
            'branch_name' => 'required'
        
        )) }}


        <!-- Apply any bg-* class to to the info-box to color it -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Datos Sucursal</h3>
          
        </div><!-- /.box-header -->
        <div class="box-body">
         
            <div class="row">
                <div class="col-md-4"> 
                  
                      {{-- <legend>Datos Sucursal</legend> --}}
                      {{-- {{ Former::legend('Sucursal') }} --}}
                       <div class="col-md-12"> 
                            <label>Nombre de la Sucursal *</label>
                            <input type="text" name ="branch_name" class="form-control" placeholder="Escriba el Nombre de la Nueva Sucursal" pattern=".{2,}" title="Ingrese Nombre de la Sucursal" required>
                            <p></p>
                            <label>Número de la Sucursal asignada por Impuestos *</label>
                            <input type="text" name ="number_branch" class="form-control" placeholder="Escriba Número de la Sucursal " title="Ingrese el número proporcionado por Impuestos"  pattern="([0-9]).{0,}" required>
                             
                            <p></p>
                            <label>Selecciones al menos un tipo de Documento *</label>
                              {{---documento consulta anidada--}}
                               <div class="list-group">
                                  @foreach($documentos as $type_document)
                                  <li class="list-group-item"><label>{{ Form::checkbox('tipo_documento[]', $type_document->id)}}  {{$type_document->name}}</label></li>
                                  @endforeach   
                                </div>

                            <p></p>
                            <label>Actividad Económica*</label>
                             <textarea class="form-control" rows="1" name="economic_activity" placeholder="Actividad Económica" pattern=".{3,}" title="Ingrese la Actividad Económica" required></textarea>
                             <p></p>
                             <label>Leyenda Ley Nº 453 *</label>
                              <input type="text" name ="law" class="form-control" placeholder="Escriba la Leyenda Ley N° 453" pattern=".{3,}" title="Ingrese la Leyenda" required>
                              <p></p>
                              <label>SFC*</label>
                              <input type="text" name ="sfc" class="form-control" placeholder="SFC" pattern=".{3,}" title="Ingrese SFC" required> <p></p>

                   </div>
                      
                </div> 
                <div class="col-md-5">
                    <legend>Dosificación</legend>
                    {{-- {{ Former::legend('Dosificación') }} --}}
                    <div class="col-md-12">
                        <label>Número de Trámite *</label>
                        <input type="text" name ="number_process" class="form-control" placeholder="Núm. de Trámite" title="Ingrese el Número de Trámite de la Sucursal" pattern="([0-9]).{7,11}" required><p></p>                        
                        <label>Número de Autorización *</label>
                        <input type="text" name ="number_autho" class="form-control" placeholder="Núm. de Autorización" title="Ingrese el Número de Autorización de la Sucursal" pattern="([0-9]).{12}" required><p></p>
                         <label>Fecha límite de Emisión *</label>

                         <div class="input-group">              
                                                      <input class="form-control pull-right" name ="deadline" name="invoice_date" id="date" type="text" placeholder="Fecha Límite de Emisión"  title="Ingrese la Fecha Límite de Emisión" required>
                                                      <div class="input-group-addon">          
                                                      <i class="fa fa-calendar"></i>
                                                      </div>
                                                    </div><!-- /.input group -->



                        <label>Llave de Dosificación *</label>
                        <input type="text" name ="key_dosage" class="form-control" placeholder="Llave de Dosificación" title="Ingrese la llave de Dosificación" pattern=".{3,}" required><p></p>
                        <input type="file" id="exampleInputFile" >
                        <p class="help-block">Archivo proporcionado por Impuestos .</p>
                    </div>

                  

                
                  
                </div>

                <div class="col-md-5">    
                  <legend>Dirección</legend>
                 
                  <label>Zona/Barrio *</label>
                  <input type="text" name ="address1" class="form-control" placeholder="Zona/Barrio " title="Ingrese la Zona/Barrio" pattern=".{3,}" required><p></p>
                   <label>Dirección *</label>
                  <input type="text" name ="address2" class="form-control" placeholder="Dirección de la Sucursal" title="Ingrese la Dirección" pattern=".{3,}" required><p></p>
                  <label>Teléfono *</label>
                  <input type="text" name ="work_phone" class="form-control" placeholder="Teléfono de la Sucursal" title="Ingrese el Número de Teléfono"  pattern="([0-9]).{5,11}" required><p></p>
                  <label>Cuidad *</label>
                  <input type="text" name ="city" class="form-control" placeholder="Ciudad" title="Ingrese la Ciudad" pattern=".{3,}" required><p></p>
                  <label>Municipio *</label>
                  <input type="text" name ="state" class="form-control" placeholder="Municipio" title="Ingrese el Municipio" pattern=".{3,}" required><p></p>
                  
                  {{-- Former::file('dosage')->label('Archivo con la Llave (*)')->inlineHelp(trans('texts.dosage_help')) --}}
                 
                 

                  {{-- Former::legend('Leyendas') --}}

                  {{-- Former::textarea('law')->label('leyenda Genérica  (*)') --}}
                
                  </div>
                  <div class="col-md-6">
                    <legend>Información Adicional</legend>
                     {{-- {{ Former::legend('información Adicional') }} --}}
                     {{-- {{ Form::checkbox('third_view', '1')}} --}}
                     <div class="checkbox">
                        <label>
                          {{ Form::checkbox('third_view', '1')}} Facturación por Terceros
                        </label>
                      </div>
                     {{-- {{ Former::checkbox('third_view')->label('Facturación por Terceros')->title('Seleccione si fuera el caso')}}     --}}
                  </div>
              </div> 

        <p></p>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                 <a href="{{ url('sucursales') }}" class="btn btn-default btn-sm btn-block">Cancelar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-remove">  </span></a>
            </div>
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar &nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
            </div>
        </div>
        <p></p>
        &nbspTodos los Campos son Requeridos (*)

         {{ Former::close() }}
        </div><!-- /.box-body -->
        <div class="box-footer">
        
        </div><!-- box-footer -->
      </div><!-- /.box -->


<script type="text/javascript">
   $("#date").datepicker();
        $('#date').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });

      $("form").submit(function() {
          $(this).submit(function() {
              return false;
          });
          return true;
      });
  </script>


@stop 
