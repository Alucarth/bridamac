@extends('header')


@section('title') Información de la Cuenta @stop
@section('encabezado')  CUENTA @stop
@section('encabezado_descripcion') Información de la Cuenta @stop 
@section('nivel') <li><a href="#"><i class="fa fa-cog"></i> Cuenta</a></li>@stop

@section('content')

 {{ Form::open(array('url' => 'editarcuenta', 'method' => 'post' ,'files'=>true ))}}
  
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">{{$cuenta->name}}</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-warning">Los cambios ejectuados se reflejarán en toda la cuenta.</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
    <label>Nit:</label> {{$cuenta->nit}} 
    <br>
    <label>Direccion Web:</label>  http://{{$cuenta->domain}}.facturavirtual.com.bo
    <br>
    @if($cuenta->is_unper)
    <label>Cuenta unipersonal:</label>  {{$cuenta->uniper}}
    <br>
    <!-- /.colocar aqui los campos personalizados de la cuenta -->
    @endif
    <br>

    <legend>Logo</legend>

       <div class="col-md-1"></div>
                    <img id="logo" name="logo"  class="img-rounded"  src="{{'data:image/jpg;base64,'.TypeDocument::getDocumento()->logo}}"  >
                    <p></p>
                    <input type='file' id="imgInp" name="imgInp" accept=".jpg, .jpeg"/>
                 
    <br><br>
    <legend>Campos Adicionales para Clientes</legend> 
    
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4"><label>Etiqueta del campo 1&nbsp;: </label> <input class="form-control" type="text" name="l1" value="{{$cuenta->custom_client_label1}}"></div>
                <div class="col-md-4"><label>Etiqueta del campo 2&nbsp;: </label> <input class="form-control" type="text" name="l2" value="{{$cuenta->custom_client_label2}}"> </div>
                <div class="col-md-4"><label>Etiqueta del campo 3&nbsp;: </label> <input class="form-control" type="text" name="l3" value="{{$cuenta->custom_client_label3}}"></div>
            </div>
          <div class="col-md-12">
                <div class="col-md-4"><label>Etiqueta del campo 4&nbsp;: </label> <input class="form-control" type="text" name="l4" value="{{$cuenta->custom_client_label4}}"> </div>
                <div class="col-md-4"><label>Etiqueta del campo 5&nbsp;: </label> <input class="form-control" type="text" name="l5" value="{{$cuenta->custom_client_label5}}"></div>
                <div class="col-md-4"><label>Etiqueta del campo 6&nbsp;: </label> <input class="form-control" type="text" name="l6" value="{{$cuenta->custom_client_label6}}"></div>
          </div>          
        </div>
    <br><br>
    <legend> Tipo de Documentos </legend>
    
    <div class="row">
        <div class="col-md-12">
            
            <ul class="list-group">
                @foreach(MasterDocument::all() as $documento)

                <li class="list-group-item"> <label>{{ Form::checkbox('documentos[]', $documento->id, TypeDocument::isEnabled($documento->id))}} {{ $documento->name}}</label></li>
                @endforeach
                
             </ul>
        </div>
        
    </div>

                    
                    <br>
     <button type="submit" class="btn btn-success ">
                           Guardar&nbsp&nbsp
                          <span class="fa fa-save" aria-hidden="true">  </span>
                        </button>

  </div><!-- /.box-body -->
  <div class="box-footer">
 
    
  </div><!-- box-footer -->
</div><!-- /.box -->
{{Form::close()}}
 <script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        
        readURL(this);

    });

  </script>

@stop 
