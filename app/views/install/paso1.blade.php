@extends('layout')


@section('title') Creacion de Sucursal @stop
@section('head') 
 
@stop

@section('body')
  
 

  
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('paso1')->method('post')->rules(array( 
        'branch_name' => 'required',
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
        'key_dosage' => 'required'
    )) }}

      <p></p>

    {{--   <ul class="navbar navbar-default">
       
        <div class ="container">
          <div class="navbar-brand">
            IPX Server
          </div>
          <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">Profile</a></li>
            <li role="presentation"><a href="#">Messages</a></li>
          </ul>
        </div> --}}
       {{--  <li class="active"><a href="#" >Paso 1  Creacion de Casa Matriz</a></li>
        <div class="container">
          <div class="active">
            Paso 1  Creacion de Casa Matriz
          </div>
        </div> --}}

        {{-- <ul class="nav navbar-nav">
           <li class="active"><a href="#" >Paso 1  Creacion de Casa Matriz</a></li>
           <li><a href="#">Paso 2  Tipos de Documentos</a></li>
        </ul> --}}
      {{-- </ul> --}}
      <nav class="navbar navbar-default">
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
              <li class="active"><a href="#">Paso 1  Creacion de Casa Matriz <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Paso 2  Tipos de Documentos</a></li>
              
            </ul>
          
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <div class="panel panel-default">
       
        <div class="panel-heading">
          
          Creacion de Casa Matriz o Sucursal 0
        </div>
       
        <div class="panel-body" > 
       
          
          <div class="row">
              <div class="col-md-4">  

                {{ Former::legend('Sucursal') }}
 
                {{ Form::hidden('account_id', Session::get('account_id')) }}

                {{ Former::text('branch_name')->label('Nombre')->title('Ejem. Casa Matriz o Sucursal 1') }}

                {{ Former::select('branch_type_id')->addOption('','')->label('tipo')
                ->fromQuery(BranchType::all(), 'name', 'id') }}

                {{ Former::textarea('economic_activity')->label('Actividad') }}

                
                    
              </div>
              <div class="col-md-10">
                {{ Former::legend('Dirección') }} 
                {{ Former::text('address2')->label('Dirección') }}
                {{ Former::text('address1')->label('Zona/Barrio') }}
                {{ Former::text('work_phone')->label('teléfono') }}
                {{ Former::text('city')->label('ciudad') }}
                {{ Former::text('state')->label('municipio') }}
              </div>
              <div class="col-md-10">    

                {{ Former::legend('Dosificación') }}

                {{ Former::text('number_process')->label('núm. de Trámite') }}

                {{ Former::text('number_autho')->label('núm. de Autorización') }}

                {{ Former::date('deadline')->label('Fecha Límite Emisión') }} 

                {{ Former::textarea('key_dosage')->label('Archivo con la Llave') }}
                
                {{-- Former::file('dosage')->label('Archivo con la Llave (*)')->inlineHelp(trans('texts.dosage_help')) --}}
               
                {{ Former::legend('información Adicional') }}

                {{ Former::checkbox('third_view')->label('Facturación por Terceros')->title('Seleccione si fuera el caso')}}

                {{-- Former::legend('Leyendas') --}}

                {{-- Former::textarea('law')->label('leyenda Genérica  (*)') --}}
              
              </div>
            </div> 

      <p><center>
        {{Former::large_primary_submit('Continuar')}}                    
    </center>
      </p>

         {{ Former::close() }}
   

      </div>
       <div class="panel-footer">IPX Server 2015</div>
    </div>
    
@stop 
