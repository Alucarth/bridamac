<!DOCTYPE html>
<html>

<head>
<title></title>

    
        
  </style>
</head>
<body>
<p>
  <h3>FACTURA VIRTUAL</h3>

  <h1>{{Auth::user()->account->name}}</h1>

  Estimado cliente: <br><br>
 
  Le informamos que para poder ver su factura N° {{$numero_factura}} por el Monto BS <strong>{{$monto}}</strong> emitida a <strong>{{$cliente}} </strong> con NIT:<strong>{{$nit}}</strong> tiene que hacer click en el siguiente enlace. 
   <label>
          <a href="{{ $link }}">ver factura</a>
        </label>
        <br>
</p>

      <strong>{{Auth::user()->account->name}}</strong><br>
       {{Branch::find(Session::get('branch_id'))->address1}}<br>
       {{Branch::find(Session::get('branch_id'))->address2}}<br>
       Telefono: {{Branch::find(Session::get('branch_id'))->work_phone}}<br>

       <center>www.facturavirtual.com</center>
</body>
</html>


