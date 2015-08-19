@extends('layout')


@section('title') Asignacion de tipos de documentos @stop
@section('head') 
 
@stop

@section('body')
  
 

  {{-- {{ Form::open(array('url' => 'paso1', 'method' => 'post'))}} --}}
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('comensar/2')->method('post')->rules(array( 
        'branch_name' => 'required'/*,
        'branch_type_id' => 'required',
        'address1' => 'required',
        'work_phone' => 'required|Numeric|match:/[0-9.-]+/',
        'address2' => 'required',
        'city' => 'required',
        'economic_activity' => 'required',
        'state' => 'required',
        'deadline' => 'required', 
        'number_process' => 'required|match:/[0-9]+/',
        'number_autho' => 'required|match:/[0-9]+/',  
        'key_dosage' => 'required'*/
    )) }}

      <p></p>

      <div class="panel panel-default">
       
        <div class="panel-heading"> 
          Por favor completa la siguiente informacion necesaria para poder facturar  
        </div>
       
        <div class="panel-body" > 
          <div class="row">
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
              <li role="presentation"><a href="#">  <span class="badge">1</span> Casa Matriz</a></li>
              <li role="presentation" class="active"><a href="#"><span class="badge">2</span> Tipo de Documentos</a></li>
              <li role="presentation"><a href="#"><span class="badge">3</span> Perfil de Administrador</a></li>
          </ul>

        </div>
        


        <div class="col-md-8">{{--panel formulario--}}

                <div class="panel panel-default">
                 
                  <div class="panel-body" > 
                    {{ Former::legend('Tipos de ducumentos') }}
                    @foreach($tipos as $tipo)

                    <div class="jumbotron">
                      <h2>{{$tipo->name}}</h2>
                      <p>{{$tipo->description}}</p>
                      <p>{{ Form::checkbox('documentos[]', $tipo->id)}}</p>
                    </div>
                    @endforeach
                  

                    <p><center>
                     <button type="submit" class="btn btn-info ">
                       Guardar
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </button>
                                   
                     </center>
                    </p>
                       {{ Former::close() }}
                  </div>
                 {{-- <div class="panel-footer">IPX Server 2015</div> --}}
                </div>
         
        </div>
      </div>

         
    </div>
  </div>
    
@stop 
