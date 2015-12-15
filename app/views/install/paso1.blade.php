@extends('layout')


@section('title') Creación de Sucursal @stop
@section('head') 
 
@stop

@section('body')
  
 

  {{ Form::open(array('url' => 'paso/2', 'method' => 'post'))}}
    <p></p>

    <div class="col-md-2"></div>
    <div class="col-md-8">   
          <div class="panel panel-default">

              <div class="panel-heading"> 
                  <h3> Por favor completa la siguiente información necesaria para poder facturar </h3>
              </div>

              <div class="panel-body" >

                 @if (Session::has('message'))
                    <div class="box box-success box-solid">
                      <div class="box-header with-border">
                        {{ Session::get('message') }}
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                    </div>    
                  @endif

                  @if (Session::has('error'))
                    <div class="box box-danger box-solid">
                      <div class="box-header with-border">
                        {{ Session::get('error') }}
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  @endif
                
                   <div class="row">

                              <div class="col-md-3">

                                  <ul class="nav nav-pills nav-stacked">
                                      
                                      <li role="presentation" ><a href="#"><span class="badge">1</span> Tipos de Documentos</a></li>
                                      <li role="presentation" class="active"><a href="#">  <span class="badge">2</span> Casa Matriz</a></li>
                                      <li role="presentation"><a href="#"><span class="badge">3</span> Perfil de Administrador</a></li>
                                  </ul>

                              </div>
                              
                              {{ Form::hidden('number_branch', '0')}}

                              <div class="col-md-9">{{--panel formulario--}}

                                  <div class="panel panel-default">
                                   
                                        <div class="panel-heading">

                                          <b>Creación de Casa Matriz o Sucursal 0 </b>
                                          
                                        </div>

                                        <div class="panel-body" >

                                             <div class="row">

                                                <div class="col-md-6">

                                                    <legend>Sucursal</legend>
                                                    <label>Nombre de la Sucursal *</label>
                                                    <input type="text" name ="branch_name" class="form-control" placeholder="Nombre de Sucursal"  pattern=".{2,}" title="Ingrese el Nombre Genérico de la Sucursal" required>
                                                    <p></p>
                                                    <input type="text" name ="number_branch" class="form-control" value="Casa Matriz ó Sucursal 0" disabled>

                                                    <p></p>

                                                    <legend>Información Requerida</legend>
                                                    
                                                    <label>Seleccione al menos un tipo de Documento</label>
                                                    
                                                      {{---documento consulta anidada--}}
                                                    <div class="list-group">
                                                        @foreach($documentos as $type_document)
                                                        <li class="list-group-item"><label>{{ Form::checkbox('tipo_documento[]', $type_document->id)}}  {{$type_document->name}}</label></li>
                                                        @endforeach   
                                                    </div>

                                                    <p></p>
                                                    <label>Actividad Económica*</label>
                                                    <textarea class="form-control" rows="2" name="economic_activity" placeholder="Actividad Económica"title="Ingrese el nombre de la Actividad Ecónomica de la Sucursal" pattern=".{3,}"required></textarea><p></p>

                                                    <input type="text" name ="law" class="form-control" placeholder="Leyenda Ley N° 453" title="Ingrese una Leyenda de la Ley N° 453" pattern=".{3,}" required> <p></p> 
                                                    <input type="text" name ="sfc" class="form-control" placeholder="SFC" title="Ingrese SFC" pattern=".{3,}" required> 

                                                </div>{{-- find del col-md-6 --}}

                                                <div class="col-md-6">
                                                    <legend>Dosificación</legend>
                                                      {{-- {{ Former::legend('Dosificación') }} --}}

                                                    <label>Número de Trámite *</label>
                                                    <input type="text" name ="number_process" class="form-control" placeholder="Núm. de Trámite" title="Ingrese el Número de Trámite de la Sucursal"  required><p></p>
                                                    <label>Número de Autorización *</label>
                                                    <input type="text" name ="number_autho" class="form-control" placeholder="Núm. de Autorización" title="Ingrese el Número de Autorización de la Sucursal"  required><p></p>
                                                   <label>Fecha límite de Emisión *</label>
                                                    <div class="input-group">              
                                                      <input class="form-control pull-right" name ="deadline" name="invoice_date" id="date" type="text" placeholder="Fecha Límite de Emisión"  title="Ingrese la Fecha Límite de Emisión" required>
                                                    <div class="input-group-addon">          
                                                      <i class="fa fa-calendar"></i>
                                                      </div>
                                                    </div><!-- /.input group -->

                    
                                                    
                                                    <label>Llave de Dosificación *</label>
                                                    <input type="text" name ="key_dosage" class="form-control" placeholder="Llave de Dosificación" title="Ingrese la llave de Dosificación" pattern=".{3,}" required><p></p>
                                                    <input type="file" id="exampleInputFile">
                                                    <p class="help-block">Archivo proporcionado por Impuestos.</p>

                                               
                                                
                                                </div>

                                                <div class="col-md-6">    
                                                    <legend>Dirección </legend>
                                                     {{-- {{ Former::legend('Dirección') }}  --}}
                                                    <label>Zona/Barrio *</label>
                                                    <input type="text" name ="address1" class="form-control" placeholder="Zona/Barrio" pattern=".{2,}"required><p></p>
                                                    <label>Dirección *</label>
                                                    <input type="text" name ="address2" class="form-control" placeholder="Dirección" required><p></p>
                                                   
                                                    <label>Teléfono *</label>
                                                    <input type="text" name ="work_phone" class="form-control" placeholder="Teléfono" 
                                                    required><p></p>
                                                    <label>Ciudad *</label>
                                                    <input type="text" name ="city" class="form-control" placeholder="Ciudad" required><p></p>
                                                    <label>Municipio *</label>
                                                    <input type="text" name ="state" class="form-control" placeholder="Municipio" required><p></p>

                                                </div>

                                                <div class="col-md-6">
                                                  <legend>Información Adicional</legend>
                                                   
                                                    
                                                   
                                                   <div class="checkbox">
                                                      <label>
                                                        {{ Form::checkbox('third_view', '1')}} Facturación por Terceros
                                                      </label>
                                                    </div>
                                                 
                                                </div>

                                                <div class="col-md-6">
                                                  <legend>Información de la Cuenta</legend>
                                                   
                                                  <div class="checkbox">
                                                      <label>
                                                        <input  id="isu" name="is_uniper" type="checkbox" value="1"> Unipersonal                                                        
                                                      </label>
                                                  </div>
                                                  <div id="david">

                                                  </div>
                                                </div>


                                             </div>{{-- fin del row--}}

                                             <p></p>
                                                <center>
                                                    <button type="submit" class="btn btn-success "> Guardar
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                  </button>                  
                                                </center>

                                        </div>{{-- fin del body--}} 

                                   
                                  </div>{{-- fin del panel default--}}
                              </div>{{-- fin del col-md-9--}}


                                 Nota: TODOS LOS CAMPOS SON REQUERIDOS

                   </div> {{--  fin del row --}}


              </div>{{-- fin del panel body --}}


          </div>{{-- fin del panel-default --}}
         
    </div> {{-- fin del col-md-8 --}}

     <script type="text/javascript">
     console.log('Hola');
            jQuery('#date').datepicker({
            dateFormat : 'yy-mm-dd'
        });
      
        $('#date').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });
        $('#isu').on('change', function(e) { 
          // From the other examples
          e.preventDefault();
          if(this.checked)
          {
             $( "<div id='prueba'> <input type='text' name ='uniper' class='form-control' placeholder='Nombre' ><p></p>  </div>" ).appendTo( "#david" );
          }
          if (!this.checked) {

             $('#prueba').remove();
             

              // this.checked = !sure;
              //$('#textbox1').val(sure.toString());
          }
      });


            $("form").submit(function() {
                $(this).submit(function() {
                    return false;
                });
                return true;
            });

          // $( "#deadline" ).datepicker({ minDate: 0, maxDate: "+0D" }).datepicker("setDate", new Date());;
          
      </script>
    
@stop 

