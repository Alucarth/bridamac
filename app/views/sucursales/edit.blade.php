@extends('header')


@section('title') Gestion de Sucursal @stop
@section('head') 
 
@stop

@section('content')
  
 

  
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('sucursales/'.$sucursal->public_id)->method('put')->rules(array( 
        'branch_name' => 'required',
      
  
    )) }}

      <p></p>

      
      <div class="panel panel-default">
       
        <div class="panel-heading">
          
          Edicion: {{$sucursal->name}}
        </div>
        <div class="panel-body"> 
       
           <div class="row">
                <div class="col-md-6">  

                  {{ Former::legend('Sucursal') }}
   
               
                  <input type="text" name ="branch_name" class="form-control" placeholder="Nombre de Sucursal" value="{{$sucursal->name}}">
                  <p></p>
                  <input type="text" name ="number_branch" class="form-control" placeholder="Numero de Sucursal segun Impuestos" value="{{$sucursal->number_branch}}">
                   
                  <p></p>
                  <label>Selecciones al menos un tipo de Documento</label>
                    {{---documento consulta anidada--}}
                     <div class="list-group">
                        @foreach( TypeDocument::getDocumentos() as $type_document)
                        <li class="list-group-item">

                          <label>{{ Form::checkbox('tipo_documento[]', $type_document->id,TypeDocumentBranch::hasTypeDocument($type_document->id,$sucursal->id))}}  {{$type_document->name}}</label>
                        </li>
                        @endforeach   
                      </div>

                  <p></p>
                   <textarea class="form-control" rows="1" name="economic_activity" placeholder="Actividad Economica" >{{$sucursal->economic_activity}}</textarea><p></p>
                    <input type="text" name ="law" class="form-control" placeholder="Leyenda Ley N° 453" value="{{$sucursal->law}}">

                  
                      
                </div>
                <div class="col-md-6">
                    {{ Former::legend('Dosificación') }}

                    <input type="text" name ="number_process" class="form-control" placeholder="núm. de Trámite" value="{{$sucursal->number_process}}"><p></p>
                    <input type="text" name ="number_autho" class="form-control" placeholder="núm. de Autorización" value="{{$sucursal->number_autho}}"><p></p>
                    <input type="date" name ="deadline" class="form-control" placeholder="Fecha Límite Emisión" value="{{$sucursal->deadline}}"><p></p>
                    <input type="text" name ="key_dosage" class="form-control" placeholder="Llave de Dosificación" value="{{$sucursal->key_dosage}}"><p></p>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Archivo proporcionado por Impuestos .</p>            
                  
                </div>
                <div class="col-md-6">    

                   {{ Former::legend('Dirección') }} 

                  <input type="text" name ="address2" class="form-control" placeholder="Dirección" value="{{$sucursal->address2}}"><p></p>
                  <input type="text" name ="address1" class="form-control" placeholder="Zona/Barrio" value="{{$sucursal->address1}}"><p></p>
                  <input type="text" name ="work_phone" class="form-control" placeholder="Teléfono" value="{{$sucursal->work_phone}}"><p></p>
                  <input type="text" name ="city" class="form-control" placeholder="Ciudad" value="{{$sucursal->city}}"><p></p>
                  <input type="text" name ="state" class="form-control" placeholder="Municipio" value="{{$sucursal->state}}"><p></p>

                
                  </div>
                  <div class="col-md-6">
                     {{ Former::legend('información Adicional') }}
                   
                     <div class="checkbox">
                        <label>
                          {{ Form::checkbox('third_view', '1',true)}} Facturacion por Terceros
                        </label>
                      </div>
                    
                  </div>
              </div> 

        <p></p><center>
          <button type="submit" class="btn btn-success ">
           Guardar
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </button>                  
      </center>

         {{ Former::close() }}
   
          

        </div>
       
    </div>
    
@stop 
