@extends('header')

@section('title')Nuevo Cliente @stop

@section('head') @stop

@section('encabezado') 	CLIENTES @stop

@section('encabezado_descripcion') Nuevo Cliente  @stop 

@section('nivel') <li><a href="{{URL::to('clientes')}}"><i class="ion-person"></i> Clientes</a></li>
            <li class="active"> Nuevo </li> @stop

@section('content')

    <script type="text/javascript">
      var i=0;
    </script>
		{{ Former::open('clientes')->method('POST') }}

        <p></p>
        <div class="panel panel-default" >
          
          <div class="panel-heading">
            <h3 class="panel-title">Panel</h3>
          </div>

          <div class="panel-body">
            Consola Knout js

            <h1>Keyrus Work!</h1>

            {{$i=0}}
            <table  >
				<tbody  data-bind="foreach: setContactos">
    				<tr>
    						<td > <input name="contactos[first_name][]" class="form-control " data-bind="value: nombres" /> </td>
            
    				</tr>
    				<tr><td><p></p></td></tr>
            <tr>
                <td > <input name="contactos[last_name][]" class="form-control " data-bind="value: apellidos" /> </td>
            
            </tr>
            <tr><td><p></p></td></tr>
            <tr>
                <td > <input name="contactos[email][]" class="form-control " data-bind="value: correo" /> </td>
            
            </tr>
            <tr><td><p></p></td></tr>
            <tr>
                <td > <input name="contactos[phone][]" class="form-control " data-bind="value: telefono" /> </td>
            
            </tr>
          
    				<tr><td> <a href="#" data-bind="click: $root.removerContacto"> eliminar contacto</a></td></tr>
    				<tr><td><p></p><p></p><td></tr>
      
    			</tbody>
			</table>

			<button type="button" id="add" data-bind="click: addContacto" class="btn btn-primary" >Adicionar </button>

          </div>
        </div>
        	<button type="submit"  class="btn btn-success" >Enviar </button>
   		{{ Former::close()}}

	 <script type="text/javascript">

 
		function Contacto(nombres,apellidos,correo,telefono)
		{
			var self = this;
      self.nombres = nombres;
      self.apellidos = apellidos;
      self.correo = correo;
      self.telefono = telefono;			
		}
		function Contactos()
		{
			var self = this;
			self.setContactos = ko.observableArray([new Contacto("david","torrez","dtorrez@gmail.com","70620481"),new Contacto("dilan","rata","dtz@gmail.com","70625")]);
		
			 self.addContacto = function() {
			        self.setContactos.push(new Contacto("elune"," asdasd","dtsssrez@gmail.com","706222481"));
			    }
	       self.removerContacto = function(contacto){
                self.setContactos.remove(contacto);
              };
		}
		


		// Activates knockout.js
		ko.applyBindings(new Contactos());
       

    </script>
@stop