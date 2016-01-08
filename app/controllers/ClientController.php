<?php

class ClientController extends \BaseController {

 /**
  * Display a listing of the resource.
  *
  * @return Response
  */
 // public function index()
 // {
 //
 // $clientes= Client::where('account_id', Auth::user()->account_id)->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')->orderBy('name', 'ASC')->simplePaginate(15);
 //
 //
 // return View::make('clientes.index', array('clients' => $clientes));
 // }



 /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
 public function create()
 {
                $account = Account::find(Auth::user()->account_id);
                return View::make('clientes.create',array('cuenta'=>$account));
  //return View::make('clientes.create',self::getViewModel());
 }

//  private static function getViewModel()
//  {
//  return [
//  'customLabel1' => Auth::user()->account->custom_client_label1,
//  'customLabel2' => Auth::user()->account->custom_client_label2,
//  'customLabel3' => Auth::user()->account->custom_client_label3,
//  'customLabel4' => Auth::user()->account->custom_client_label4,
//  'customLabel5' => Auth::user()->account->custom_client_label5,
//  'customLabel6' => Auth::user()->account->custom_client_label6,
//  'customLabel7' => Auth::user()->account->custom_client_label7,
//  'customLabel8' => Auth::user()->account->custom_client_label8,
//  'customLabel9' => Auth::user()->account->custom_client_label9,
//  'customLabel10' => Auth::user()->account->custom_client_label10,
//  'customLabel11' => Auth::user()->account->custom_client_label11,
//  'customLabel12' => Auth::user()->account->custom_client_label12
//  ];
//  }

 // public function buscar($cadena="")
 // {
 // $cadena = Input::get('name');
 // $clients = Client::where('name','like',$cadena."%")->select('id','name')->get();
 // return Response::json($clients);
 // }
 public function getContacts(){
  $id = Input::get('id');
  //return Response::json($id);
  $contacts = Contact::where('client_id','=', $id )->whereNull('deleted_at')->select('id','first_name','last_name','email','phone')->get();
  $client= Client::where('id',$id)->firstOrFail();
  $enviar=[
  'contact'=>$contacts,
  'note'=>$client->private_notes,
  ];
  return Response::json($enviar);
 }
 public function buscar2($cadena="")
 {
  $cadena = Input::get('name');
  $clients = Client::where('account_id','=', Auth::user()->account_id)->where('name','like',$cadena."%")->select('id','name','nit','business_name','public_id')->get();
        $total =0;
        foreach($clients as $key => $value) {
         $total++;
        }
  if($total==0)
   $clients = Client::where('nit','like',$cadena."%")->where('account_id','=', Auth::user()->account_id)->select('id','name','nit','business_name','public_id')->get();
  return Response::json($clients);
  $newclients = array();
/*
  $nuevo = Client::createNew();
  $nuevo->id ="0";
  $nuevo->name="Nuevo Cliente";

  $newclients[0] = $nuevo;
  $ind = 1;
  foreach ($clients as $client ) {
   # code...
   $newclients[$ind++] = $client;

  }*/
  $newclients[0]=array('name'=> 'Nuevo', 'id'=>'0');//['name'] = $cli['name'];
  $ind =1;
  foreach ($clients as $key => $cli) {
   $newclients[$ind]=array('name'=> $cli->name, 'id'=>$cli->id);//['name'] = $cli['name'];
   //$newclients[$ind]['id'] = $cli['id'];
   $ind++;
  }
  //$newclients[$ind]['name'] = "nuevo";
  //$newclients[$ind]['id'] = "new";
  // $clients = Client::where('name','like',$cadena."%")->select('id','account_id','name')->get();
  //array_unshift($clients,array('id':'1','name':'dadsf','account_id':'1'));

   // $myarray['blah'] = json_decode('[
   // {"label":"foo","name":"baz"},
   // {"label":"boop","name":"beep"}
   // ]',true);
     return Response::json($newclients);
 }

 /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
 public function store()
 {

  // return Response::json(Input::all());
  $client = Client::createNew();
  $client->setNit(trim(Input::get('nit')));
  $client->setName(trim(Input::get('name')));
  $client->setBussinesName(trim(Input::get('business_name')));
                $client->setWorkPhone(trim(Input::get('work_phone')));
  $client->setCustomValue1(trim(Input::get('l1')));
  $client->setCustomValue2(trim(Input::get('l2')));
  $client->setCustomValue3(trim(Input::get('l3')));
  $client->setCustomValue4(trim(Input::get('l4')));
  $client->setCustomValue5(trim(Input::get('l5')));
  $client->setCustomValue6(trim(Input::get('l6')));

  $client->setCustomValue7(trim(Input::get('l7')));
  $client->setCustomValue8(trim(Input::get('l8')));
  $client->setCustomValue9(trim(Input::get('l9')));
  $client->setCustomValue10(trim(Input::get('l10')));
  $client->setCustomValue11(trim(Input::get('l11')));
  $client->setCustomValue12(trim(Input::get('l12')));
//  $client->setCustomValue7(trim(Input::get('custom_value7')));
//  $client->setCustomValue8(trim(Input::get('custom_value8')));
//  $client->setCustomValue9(trim(Input::get('custom_value9')));
//  $client->setCustomValue10(trim(Input::get('custom_value10')));
//  $client->setCustomValue11(trim(Input::get('custom_value11')));
//  $client->setCustomValue12(trim(Input::get('custom_value12')));

  $client->setAddress1(trim(Input::get('address1')));
  $client->setAddress2(trim(Input::get('address2')));
  $client->setPrivateNotes(trim(Input::get('private_notes')));

  $resultado = $client->guardar();

  // $new_contacts = json_decode(Input::get('data'));
    if(Input::get('json')=="1")
    {
        $client->save();
        return Response::json($client);
    }
  if(!$resultado){
   $message = "Cliente creado con éxito";
//  echo "producto salvado";
   $client->save();
  }
  else
  {
   $url = 'clientes/create';
   Session::flash('error',  $resultado);
                    return Redirect::to($url)
                    ->withInput();
  }
  $isPrimary = true;


  $contactos = Utils::parseContactos(Input::get('contactos'));
  if($contactos)
  {
   foreach ($contactos as $contacto) {
   # code...
   // $contador++;
    $contact_new = Contact::createNew();
    $contact_new->client_id=$client->getId();

    $contact_new->setFirstName(trim($contacto['first_name']));
    $contact_new->setLastName(trim($contacto['last_name']));
    $contact_new->setEmail(trim(strtolower($contacto['email'])));
    $contact_new->setPhone(trim(strtolower($contacto['phone'])));
    $contact_new->setPosition(trim($contacto['position']));
    $contact_new->setIsPrimary($isPrimary);
    $isPrimary = false;

    $resultado = $contact_new->guardar();
    //print_r($resultado);
    $client->contacts()->save($contact_new);
   }
  }


  Session::flash('message', $message);
  return Redirect::to('clientes');
 }



 /**
  * Display the specified resource.
  *
  * @param int $id
  * @return Response
  */
 public function show($publicId)
 {
  $client = Client::scope($publicId)->withTrashed()->with('contacts')->first();

  if($client)
  {


  //$client = Client::scope($publicId)->with('contacts')->firstOrFail();
  $getTotalCredit = Credit::scope()->where('client_id', '=', $client->id)->whereNull('deleted_at')->where('balance', '>', 0)->sum('balance');

  $invoices = Invoice::join('invoice_statuses', 'invoice_statuses.id', '=','invoices.invoice_status_id')
       ->where('invoices.account_id',Auth::user()->account_id)
       ->where('invoices.client_id',$client->id)
       ->where('invoices.branch_id',Session::get('branch_id'))
       ->select('invoices.invoice_number','invoices.invoice_date','invoices.importe_total','invoices.balance','invoices.due_date','invoice_statuses.name','invoices.public_id')->get();
  $pagos = Payment::join('invoices', 'invoices.id', '=','payments.invoice_id')
        ->join('payment_types','payment_types.id','=','payments.payment_type_id')
         ->where('payments.account_id',Auth::user()->account_id)
         ->where('payments.client_id',$client->id)
         ->select('invoices.invoice_number','payments.transaction_reference','payment_types.name','payments.amount','payments.payment_date')
         ->get();
                $creditos = Credit::where('account_id','=',Auth::user()->account_id)->where('client_id','=',$client->getId())->get();

  $data = array(
   'title' => 'Ver Cliente',
   'client' => $client,
   'invoices' => $invoices,
   'pagos' => $pagos,
   'credit' => $getTotalCredit,
                        'creditos'=>$creditos,
  );
  // return Response::json($data);

   return View::make('clientes.show', $data);
  }

  Session::flash('error', 'No existe el usuario');
  return Redirect::to('clientes');

 }


 /**
  * Show the form for editing the specified resource.
  *
  * @param int $id
  * @return Response
  */
 public function edit($publicId)
 {

  $client = Client::scope($publicId)->withTrashed()->with('contacts')->first();

  if($client)
  {
   if($client->deleted_at!=null)
   {

    $client->restore();
   }


   $contacts = $client->contacts;
   $contactos =array();
   foreach ($contacts as $contact) {

    # code...
    $contactos [] = array('id'=>$contact->id,'nombres'=> $contact->first_name,'apellidos' => $contact->last_name,'email'=> $contact->email,'phone'=>$contact->phone, 'position'=>$contact->position);
 //
   }   
   $data = [
    'client' => $client,
    'contactos' => $contactos,
    'url' => 'clientes/' . $publicId,
    'title' => 'Editar Cliente'
   ];
   $account = Account::find(Auth::user()->account_id);
   //data = array_merge($data, self::getViewModel());
                 $data = array_merge($data, array('cuenta'=>$account));

   // return Response::json($data);
   return View::make('clientes.edit', $data);
  }
  Session::flash('error', 'No existe el usuario');
  return Redirect::to('clientes');
 }


 /**
  * Update the specified resource in storage.
  *
  * @param int $id
  * @return Response
  */
 public function update($publicId)
 {


  // return Response::json($contactos);
  $client = Client::scope($publicId)->firstOrFail();
  $client->setNit(trim(Input::get('nit')));
  $client->setName(trim(Input::get('name')));
  $client->setBussinesName(trim(Input::get('business_name')));
                $client->setWorkPhone(trim(Input::get('work_phone')));
  $client->setCustomValue1(trim(Input::get('l1')));
  $client->setCustomValue2(trim(Input::get('l2')));
  $client->setCustomValue3(trim(Input::get('l3')));
  $client->setCustomValue4(trim(Input::get('l4')));
  $client->setCustomValue5(trim(Input::get('l5')));
  $client->setCustomValue6(trim(Input::get('l6')));
  $client->setCustomValue7(trim(Input::get('l7')));
  $client->setCustomValue8(trim(Input::get('l8')));
  $client->setCustomValue9(trim(Input::get('l9')));
  $client->setCustomValue10(trim(Input::get('l10')));
  $client->setCustomValue11(trim(Input::get('l11')));
  $client->setCustomValue12(trim(Input::get('l12')));
 // $client->setCustomValue7(trim(Input::get('custom_value7')));
 // $client->setCustomValue8(trim(Input::get('custom_value8')));
 // $client->setCustomValue9(trim(Input::get('custom_value9')));
 // $client->setCustomValue10(trim(Input::get('custom_value10')));
 // $client->setCustomValue11(trim(Input::get('custom_value11')));
 // $client->setCustomValue12(trim(Input::get('custom_value12')));

  $client->setAddress1(trim(Input::get('address1')));
  $client->setAddress2(trim(Input::get('address2')));
  $client->setPrivateNotes(trim(Input::get('private_notes')));

  $resultado = $client->guardar();

  if(!$resultado){
   $message = "Cliente actualizado con éxito";
   $client->save();
  }
  else
  {
   $url = 'clientes/create';
   Session::flash('error',  $resultado);
         return Redirect::to($url)
           ->withInput();
  }


  if(Input::has('contactos'))
  {
   // Actualizando contactos si existe


   $contactos = Utils::parseContactosUpdate(Input::get('contactos'));
   // return Response::json($contactos);
   $contactosBorrar= array();

    foreach ($contactos as $contacto) {

     if(!empty($contacto['id']))
     {
      $contactosBorrar[]= $contacto['id'];
     }

    }

   foreach ($client->contacts as $contact)
   {
    $sw =true;

    foreach ($contactos as $contacto) {
     # code...

     if(!empty($contacto['id']))
     {
      if($contact->id==$contacto['id'])
      {
       $contact->setFirstName(trim($contacto['first_name']));
       $contact->setLastName(trim($contacto['last_name']));
       $contact->setEmail(trim(strtolower($contacto['email'])));
       $contact->setPhone(trim(strtolower($contacto['phone'])));
       $contact->setPosition(trim($contacto['position']));
       $contact->save();
      }

     }

    }

   }

   $primario = true;
   foreach ($contactos as $contacto) {
    # code...
    if(empty($contacto['id']))
    {
     $contact_new = Contact::createNew();
     $contact_new->client_id=$client->getId();

     $contact_new->setFirstName(trim($contacto['first_name']));
     $contact_new->setLastName(trim($contacto['last_name']));
     $contact_new->setEmail(trim(strtolower($contacto['email'])));
     $contact_new->setPhone(trim(strtolower($contacto['phone'])));
     $contact_new->setPosition(trim($contacto['position']));
     $contact_new->setIsPrimary($primario);
     $primario = false;

     $resultado = $contact_new->guardar();
     //print_r($resultado);
     $client->contacts()->save($contact_new);
    }
   }

   foreach ($client->contacts as $contact) {
    # code...
    if(!in_array($contact->id, $contactosBorrar))
    {
     $contact->delete();
    }
   }
  }
  else
  {
   if($client->contacts)
   {
    foreach ($client->contacts as $contacto) {

     $contacto->delete();
     # code...
    }
   }


  }



  // return Response::json($contactosBorrar);
  Session::flash('message', $message);

  return Redirect::to('clientes/' . $client->getPublicId());
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param int $id
  * @return Response
  */
 public function destroy($public_id)
 {

  $client = Client::scope($public_id)->firstOrFail();

  if($client->borrar()){

   Session::flash('message', $client->getErrorMessage());
   // return $client->getErrorMessage();
   return Redirect::to('clientes');
  }



  Session::flash('error', $client->getErrorMessage());
  // return var_dump($client);
  return Redirect::to('clientes/'.$public_id);

  // return Response::json(array('XD'=>'Ooooo'));

  // $getTotalBalance = $client->balance;
  // $getTotalCredit = Credit::scope()->where('client_id', '=', $client->id)->whereNull('deleted_at')->where('balance', '>', 0)->sum('balance');

  // if ($getTotalBalance > 0) {
  // $message = "El cliente " . $client->name . " tiene " . $getTotalBalance . " pendiente de pago.";
  // Session::flash('error', $message);
  // return Redirect::to('clientes');
  // }else if ($getTotalCredit > 0) {
  // $message = "El cliente " . $client->name . " tiene " . $getTotalCredit . " de Crédito disponible.";
  // Session::flash('error', $message);
  // return Redirect::to('clientes');
  // }else{
  // return Response::json($client);
  // $client->delete();
  // $message = "Cliente eliminado con éxito";
  //
  // return Redirect::to('clientes');
  // }

 }

 public function cliente($public_id)
    {
      // $user_id = Auth::user()->getAuthIdentifier();
     // $user = DB::table('users')->select('account_id')->where('id',$user_id)->first();
     $client = DB::table('clients')->select('id','name', 'business_name','nit','public_id')->where('account_id',Auth::user()->account_id)->where('public_id',$public_id)->first();

     if($client!=null)
     {

      $datos = array(
       'resultado' => 0,
       'cliente' => $client

      );
      return Response::json($datos);
     }
     $datos = array(
       'resultado' => 1,
       'mensaje' => 'cliente no encontrado'

      );
      return Response::json($datos);

    }

  public function index($name = null, $numero = null, $nit = null, $telefono = null, $matricula = null)
  {

   $name = Input::get('name');
   $numero = Input::get('numero');
   $nit = Input::get('nit');
   $telefono = Input::get('telefono');
   $matricula = Input::get('matricula');

  //  die("index");

  Session::put('sw','DESC');

   if(!$numero && !$name && !$nit && !$telefono && !$matricula)
   {
    $clientes= Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')->orderBy('public_id', 'DESC')->simplePaginate(15);
    return View::make('clientes.index', array('clients' => $clientes,'sw'=>'ASC'));
   }
   if ($numero) {

     $clientes = Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
    ->where('public_id', 'like', $numero."%")
    ->orderBy('public_id', $sw)
    ->simplePaginate(15);
    $data = [
      'clients' => $clientes,
      'numero' => $numero,
      'name' => $name,
      'nit' => $nit,
      'telefono' => $telefono
    ];
    return View::make('clientes.index', $data);
  }

   if ($name) {

     $clientes = Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
    ->where('name', 'like', $name."%")
    ->orderBy('name', $sw)
    ->simplePaginate(15);
    $data = [
      'clients' => $clientes,
      'numero' => $numero,
      'name' => $name,
      'nit' => $nit,
      'telefono' => $telefono
    ];
    return View::make('clientes.index', $data);
    }

    if ($nit) {

     $clientes = Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
    ->where('nit', 'like', $nit."%")
    ->orderBy('nit', $sw)
    ->simplePaginate(15);
    $data = [
      'clients' => $clientes,
      'numero' => $numero,
      'name' => $name,
      'nit' => $nit,
      'telefono' => $telefono
    ];
    return View::make('clientes.index', $data);
    }

    if ($telefono) {

     $clientes = Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
    ->where('work_phone', 'like', $telefono."%")
    ->orderBy('work_phone', $sw)
    ->simplePaginate(15);
    $data = [
      'clients' => $clientes,
      'numero' => $numero,
      'name' => $name,
      'nit' => $nit,
      'telefono' => $telefono
    ];
    return View::make('clientes.index', $data);
    }

    if ($matricula) {

     $clientes = Client::where('account_id', Auth::user()->account_id)
    ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
    ->where('custom_value4', 'like', $matricula."%")
    ->orderBy('custom_value4', $sw)
    ->simplePaginate(15);
    $data = [
      'clients' => $clientes,
      'numero' => $numero,
      'name' => $name,
      'nit' => $nit,
      'telefono' => $telefono,
      'matricula' =>$matricula
    ];
    return View::make('clientes.index', $data);
    }
 }

   public function indexDown($name = null, $numero = null, $nit = null, $telefono = null, $matricula = null)
   {


    $name = Input::get('name');
    $numero = Input::get('numero');
    $nit = Input::get('nit');
    $telefono = Input::get('telefono');
    $matricula = Input::get('matricula');

    if(Session::get('sw')=='DESC')
    {

      Session::put('sw','ASC');
    }
    else {

      Session::put('sw','DESC');

    }

    $sw = Session::get('sw');
    if(!$numero && !$name && !$nit && !$telefono && !$matricula)
    {
     $clientes= Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')->orderBy('public_id', $sw)->simplePaginate(15);
    //  return View::make('clientes.index', array('clients' => $clientes));
     return View::make('clientes.index', array('clients' => $clientes,'sw'=>'ASC'));
    }
    if ($numero) {

      $clientes = Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
     ->where('public_id', 'like', $numero."%")
     ->orderBy('public_id', $sw)
     ->simplePaginate(15);
     $data = [
       'clients' => $clientes,
       'numero' => $numero,
       'name' => $name,
       'nit' => $nit,
       'telefono' => $telefono
      //  'sw'=> $swaux
     ];
     return View::make('clientes.index', $data);
   }

    if ($name) {

      $clientes = Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
     ->where('name', 'like', $name."%")
     ->orderBy('name', $sw)
     ->simplePaginate(15);
     $data = [
       'clients' => $clientes,
       'numero' => $numero,
       'name' => $name,
       'nit' => $nit,
       'telefono' => $telefono
     ];
     return View::make('clientes.index', $data);
     }

     if ($nit) {

      $clientes = Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
     ->where('nit', 'like', $nit."%")
     ->orderBy('nit', $sw)
     ->simplePaginate(15);
     $data = [
       'clients' => $clientes,
       'numero' => $numero,
       'name' => $name,
       'nit' => $nit,
       'telefono' => $telefono
     ];
     return View::make('clientes.index', $data);
     }

     if ($telefono) {

      $clientes = Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
     ->where('work_phone', 'like', $telefono."%")
     ->orderBy('work_phone', $sw)
     ->simplePaginate(15);
     $data = [
       'clients' => $clientes,
       'numero' => $numero,
       'name' => $name,
       'nit' => $nit,
       'telefono' => $telefono
     ];
     return View::make('clientes.index', $data);
     }

     if ($matricula) {

      $clientes = Client::where('account_id', Auth::user()->account_id)
     ->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')
     ->where('custom_value4', 'like', $matricula."%")
     ->orderBy('custom_value4', $sw)
     ->simplePaginate(15);
     $data = [
       'clients' => $clientes,
       'numero' => $numero,
       'name' => $name,
       'nit' => $nit,
       'telefono' => $telefono,
       'matricula' => $matricula
     ];
     return View::make('clientes.index', $data);
     }

  }

}
