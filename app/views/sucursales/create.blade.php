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
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            {{-- <span class="label label-primary">Label</span> --}}
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
         
            <div class="row">
                <div class="col-md-4"> 
                  
                      <legend></legend>
                      {{-- {{ Former::legend('Sucursal') }} --}}
                       <div class="col-md-12"> 
                            <label>Nombre de la Sucursal *</label>
                            <input type="text" name ="branch_name" class="form-control" placeholder="Escriba el Nombre de la Nueva Sucursal" pattern=".{2,}" title="Ingrese Nombre de la Sucursal" required>
                            <p></p>
                            <label>Nombre de la Sucursal asignada por Impuestos *</label>
                            <input type="text" name ="number_branch" class="form-control" placeholder="Escriba Nombre de la Sucursal asignada por Impuestos" title="Ingrese el nombre proporcionado por Impuestos"  required>
                             
                            <p></p>
                            <label>Selecciones al menos un tipo de Documento</label>
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
                              <input type="text" name ="law" class="form-control" placeholder="Escriba la Leyenda Ley N° 453" pattern=".{10,}" title="Ingrese la Leyenda" required>
                              <p></p>
                              <input type="text" name ="sfc" class="form-control" placeholder="SFC" pattern=".{3,}" title="Ingrese SFC" > <p></p>

                   </div>
                      
                </div> 
                <div class="col-md-4">
                    <legend>Dosificación</legend>
                    {{-- {{ Former::legend('Dosificación') }} --}}
                    <div class="col-md-12">
                        <input type="text" name ="number_process" class="form-control" placeholder="núm. de Trámite" ><p></p>
                        <input type="text" name ="number_autho" class="form-control" placeholder="núm. de Autorización" ><p></p>
                        <input type="date" name ="deadline" class="form-control" placeholder="Fecha Límite Emisión" ><p></p>
                        <input type="text" name ="key_dosage" class="form-control" placeholder="Llave de Dosificación" ><p></p>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">Archivo proporcionado por Impuestos .</p>
                    </div>

                  

                 
                  
                </div>

                <div class="col-md-6">    

                   {{ Former::legend('Dirección') }} 
                  <input type="text" name ="address2" class="form-control" placeholder="Dirección" ><p></p>
                  <input type="text" name ="address1" class="form-control" placeholder="Zona/Barrio" ><p></p>
                  <input type="text" name ="work_phone" class="form-control" placeholder="Teléfono" ><p></p>
                  <input type="text" name ="city" class="form-control" placeholder="Ciudad" ><p></p>
                  <input type="text" name ="state" class="form-control" placeholder="Municipio" ><p></p>
                  
                  {{-- Former::file('dosage')->label('Archivo con la Llave (*)')->inlineHelp(trans('texts.dosage_help')) --}}
                 
                 

                  {{-- Former::legend('Leyendas') --}}

                  {{-- Former::textarea('law')->label('leyenda Genérica  (*)') --}}
                
                  </div>
                  <div class="col-md-6">
                     {{ Former::legend('información Adicional') }}
                     {{-- {{ Form::checkbox('third_view', '1')}} --}}
                     <div class="checkbox">
                        <label>
                          {{ Form::checkbox('third_view', '1')}} Facturacion por Terceros
                        </label>
                      </div>
                     {{-- {{ Former::checkbox('third_view')->label('Facturación por Terceros')->title('Seleccione si fuera el caso')}}     --}}
                  </div>
              </div> 

        <p></p><center>
          <button type="submit" class="btn btn-success ">
           Guardar
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </button>                  
      </center>

         {{ Former::close() }}
        </div><!-- /.box-body -->
        <div class="box-footer">
        
        </div><!-- box-footer -->
      </div><!-- /.box -->
     
    
@stop 
