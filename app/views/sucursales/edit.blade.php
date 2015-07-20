@extends('layout')


@section('title') Gestion de Sucursal @stop
@section('head') 
 
@stop

@section('body')
  
 

  
  {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('crear/sucursal')->method('post')->rules(array( 
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

      
      <div class="panel panel-default">
       
        <div class="panel-heading">
          
          Creacion de Sucursal
        </div>
        <div class="panel-body"> 
       
          
          <div class="row">
              <div class="col-md-6">  

                {{ Former::legend('Sucursal') }}
              
 
                {{ Form::hidden('account_id', Session::get('account_id')) }}

                {{ Former::text('branch_name')->label('Nombre (*)')->title('Ejem. Casa Matriz o Sucursal 1') }}

                {{ Former::select('branch_type_id')->addOption('','')->label('tipo  (*)')
                    ->fromQuery(BranchType::all(), 'name', 'id') }}

                {{ Former::textarea('economic_activity')->label('Actividad    (*)') }}

                {{ Former::legend('Dirección') }} 
                {{ Former::text('address2')->label('Dirección (*)') }}
                {{ Former::text('address1')->label('Zona/Barrio (*)') }}
                {{ Former::text('work_phone')->label('teléfono (*)') }}
                {{ Former::text('city')->label('ciudad (*)') }}
                {{ Former::text('state')->label('municipio (*)') }}
                    
              </div>

              <div class="col-md-6">    

                {{ Former::legend('Dosificación') }}

                {{ Former::text('number_process')->label('núm. de Trámite (*)') }}

                {{ Former::text('number_autho')->label('núm. de Autorización (*)') }}

                {{ Former::date('deadline')->label('Fecha Límite Emisión (*)') }} 

                {{ Former::textarea('key_dosage')->label('Archivo con la Llave (*)') }}
                
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
