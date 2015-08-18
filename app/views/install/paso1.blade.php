@extends('layout')


@section('title') Creacion de Sucursal @stop
@section('head') 
 
@stop

@section('body')
  
 

  {{-- {{ Form::open(array('url' => 'paso1', 'method' => 'post'))}} --}}
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('comensar/1')->method('post')->rules(array( 
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
              <li role="presentation" ><a href="#">  <span class="badge">1</span> Perfil de Administrador</a></li>
              <li role="presentation" class="active"><a href="#"><span class="badge">2</span> Casa Matriz</a></li>
              <li role="presentation"><a href="#"><span class="badge">3</span> Tipo de Documentos</a></li>
          </ul>

        </div>
        


        <div class="col-md-8">{{--panel formulario--}}

            <div class="panel panel-default">
       
        <div class="panel-heading">
          
          Creacion de Casa Matriz o Sucursal 0
        </div>
       
        <div class="panel-body" > 
       
          
            <div class="row">
                <div class="col-md-6">  

                  {{ Former::legend('Sucursal') }}
   
                 {{--  {{ Form::hidden('account_id', Session::get('account_id')) }}
               --}}
                    
                    {{ Former::text('branch_name')->label('Nombre')->title('Ejem. Casa Matriz o Sucursal 1') }}
                    {{ Former::select('branch_type_id')->addOption('','')->label('tipo')
                  ->fromQuery(BranchType::all(), 'name', 'id') }}
                 
                  
                 

                  
                      
                </div>
                <div class="col-md-6">
                  {{ Former::legend('Dirección') }} 
                  {{ Former::text('address2')->label('Dirección') }}
                  {{ Former::text('address1')->label('Zona/Barrio') }}
                  {{ Former::text('work_phone')->label('teléfono') }}
                  {{ Former::text('city')->label('ciudad') }}
                  {{ Former::text('state')->label('municipio') }}
                </div>
                <div class="col-md-6">    

                  {{ Former::legend('Dosificación') }}

                  {{ Former::text('number_process')->label('núm. de Trámite') }}

                  {{ Former::text('number_autho')->label('núm. de Autorización') }}

                  {{ Former::date('deadline')->label('Fecha Límite Emisión') }} 

                  {{ Former::textarea('key_dosage')->label('Archivo con la Llave') }}
                  
                  {{-- Former::file('dosage')->label('Archivo con la Llave (*)')->inlineHelp(trans('texts.dosage_help')) --}}
                 
                 

                  {{-- Former::legend('Leyendas') --}}

                  {{-- Former::textarea('law')->label('leyenda Genérica  (*)') --}}
                
                  </div>
                  <div class="col-md-6">
                     {{ Former::legend('información Adicional') }}

                     {{ Former::checkbox('third_view')->label('Facturación por Terceros')->title('Seleccione si fuera el caso')}}    
                  </div>
              </div> 

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
     {{-- hasta aqui lo del formulario --}}
     

      
    
@stop 
