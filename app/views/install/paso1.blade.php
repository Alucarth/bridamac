@extends('layout')


@section('title') Creación de Sucursal @stop
@section('head') 
 
@stop

@section('body')
  
 

  {{ Form::open(array('url' => 'paso/2', 'method' => 'post'))}}
    <p></p>
    
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

                                          <b>Creación de Casa Matriz o Sucursal 0 </b> asdasd
                                          
                                        </div>

                                        <div class="panel-body" >

                                             <div class="row">

                                                <div class="col-md-6">

                                                    <legend>Sucursal</legend>

                                                    <input type="text" name ="branch_name" class="form-control" placeholder="Nombre de Sucursal" title="Debe Asignar un nombre a la Sucursal 0" pattern=".{4,}">
                                                    <p></p>
                                                    <input type="text" name ="number_branch" class="form-control" placeholder="Casa Matriz ó Sucursal 0" disabled>

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

                                                    <textarea class="form-control" rows="2" name="economic_activity" placeholder="Actividad Economica"></textarea><p></p>

                                                    <input type="text" name ="law" class="form-control" placeholder="Leyenda Ley N° 453" >  

                                                </div>{{-- find del col-md-6 --}}

                                                <div class="col-md-6">
                                                    <legend>Dosificación</legend>
                                                      {{-- {{ Former::legend('Dosificación') }} --}}

                                                    <input type="text" name ="number_process" class="form-control" placeholder="Núm. de Trámite" ><p></p>
                                                    <input type="text" name ="number_autho" class="form-control" placeholder="Núm. de Autorización" ><p></p>
                                                    <input type="date" name ="deadline" class="form-control" placeholder="Fecha Límite de Emisión" ><p></p>
                                                    <input type="text" name ="key_dosage" class="form-control" placeholder="Llave de Dosificación" ><p></p>
                                                    <input type="file" id="exampleInputFile">
                                                    <p class="help-block">Archivo proporcionado por Impuestos.</p>

                                               
                                                
                                                </div>

                                                <div class="col-md-6">    
                                                    <legend>Dirección</legend>
                                                     {{-- {{ Former::legend('Dirección') }}  --}}
                                                    <input type="text" name ="address2" class="form-control" placeholder="Dirección" ><p></p>
                                                    <input type="text" name ="address1" class="form-control" placeholder="Zona/Barrio" ><p></p>
                                                    <input type="text" name ="work_phone" class="form-control" placeholder="Teléfono" ><p></p>
                                                    <input type="text" name ="city" class="form-control" placeholder="Ciudad" ><p></p>
                                                    <input type="text" name ="state" class="form-control" placeholder="Municipio" ><p></p>

                                                </div>

                                                <div class="col-md-6">
                                                  <legend>Información Adicional</legend>
 
                                                   <div class="checkbox">
                                                      <label>
                                                        {{ Form::checkbox('third_view', '1')}} Facturación por Terceros
                                                      </label>
                                                    </div>
                                                 
                                                </div>


                                             </div>{{-- fin del row--}}

                                             <p></p>
                                                <center>
                                                    <button type="submit" class="btn btn-success ">
                                                     Guardar
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                  </button>                  
                                                </center>

                                        </div>{{-- fin del body--}} 

                                   
                                  </div>{{-- fin del panel default--}}
                              </div>{{-- fin del col-md-9--}}



                   </div> {{--  fin del row --}}


               


              </div>{{-- fin del panel body --}}


          </div>{{-- fin del panel-default --}}
         
    </div> {{-- fin del col-md-8 --}}

     
    
@stop 
