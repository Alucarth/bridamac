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

      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ Auth::user()->account->name}}</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="#">Paso 1  Creacion de Casa Matriz <span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="#">Paso 2  Tipos de Documentos</a></li>
            </ul>
          
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <div class="panel panel-default">
       
        {{-- <div class="panel-heading">
          
          Creacion de Casa Matriz o Sucursal 0
        </div> --}}
       
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
    
@stop 
