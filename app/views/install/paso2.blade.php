@extends('layout')


@section('title') Asignacion de tipos de documentos @stop
@section('head') 
 
@stop

@section('body')
  
 

  {{ Form::open(array('url' => 'comensar/2', 'method' => 'post' ,'files'=>true ))}} {{-- files importante para el envio de imagenes--}}

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
                    {{ Former::legend('Logo') }}

                    
                    {{-- <img id="logo" src="#" alt="imagen" class="img-rounded"> --}}
                    <img id="logo" name="logo" data-src="holder.js/140x140" class="img-rounded" alt="140x140" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNGY0NzM1MjM5MyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE0ZjQ3MzUyMzkzIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 140px; height: 140px;">
                    <p></p>
                    <input type='file' id="imgInp" name="imgInp" />
                      {{-- {{ Form::file('file','',array('id'=>'imgInp')) }} --}}

                  
                    <p><center>
                     <button type="submit" class="btn btn-info ">
                       Guardar
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </button>
                                   
                     </center>
                    </p>
                       {{ Form::close() }}
                  </div>
                 {{-- <div class="panel-footer">IPX Server 2015</div> --}}
                </div>
         
        </div>
      </div>

         
    </div>
  </div>

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
