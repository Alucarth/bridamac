<?php

class SearchController extends \BaseController {

public function getClients(){

  $clientes= Client::where('account_id', Auth::user()->account_id)->select('public_id', 'name', 'nit', 'custom_value4', 'work_phone')->orderBy('name', 'ASC')->get();
  //$clientes= Client::where('account_id', Auth::user()->account_id)->orderBy('name', 'ASC')->get();
  //return $clientes;
  //return Response::json($clientes);
  foreach ($clientes as $key => $client) {
    $client->name2 = "<a href='clientes/$client->public_id'>$client->name</a>";
    $client->nit2 = "<a href='clientes/$client->public_id'>$client->nit</a>";
    $client->campo = "<a href='clientes/$client->public_id'>$client->custom_value4</a>";
    $client->button = "<a class='btn btn-primary btn-xs' data-task='view' href='clientes/$client->public_id'  style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-eye-open'></i></a> <a class='btn btn-warning btn-xs' href='clientes/$client->public_id/edit' style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-edit'></i></a>";

}
  $clientJson = ['data'=>$clientes];

  return Response::json($clientJson);

}

public function getProducts(){
  $products = Product::where('account_id', Auth::user()->account_id)->select('public_id','product_key', 'notes', 'cost',  'is_product', 'category_id')->where('is_product', 1)->orderBy('product_key', 'ASC')->get();
  foreach ($products as $key => $product) {
      $producOrService = $product->is_product?'producto':'servicio';
      $category_name = Category::where('account_id', Auth::user()->account_id)->select('name')->where('id', $product->category_id)->first();
      $product->product_service = $producOrService;
      $product->category_name = $category_name->name;
      $product->accion = "<a class='btn btn-primary btn-xs' data-task='view' href='productos/$product->public_id'  style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-eye-open'></i></a> <a class='btn btn-warning btn-xs' href='productos/$product->public_id/edit' style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-edit'></i></a>";
  }

  $productJson = ['data'=>$products];
  return Response::json($productJson);
}

public function getInvoices(){
  $invoices = Invoice::where('account_id', Auth::user()->account_id)->where('branch_id', Session::get('branch_id'))->select('public_id','invoice_status_id','client_id', 'invoice_number','invoice_date','importe_total','branch_name')->orderBy('public_id','DESC')->get();
  foreach ($invoices as $key => $invoice) {
      $invoice_razon = Client::where('account_id', Auth::user()->account_id)->select('name')->where('id', $invoice->client_id)->first();
      $invoice->razon = $invoice_razon->name;
      $estado = InvoiceStatus::where('id', $invoice->invoice_status_id)->first();
      $invoice->estado = $estado->name;
      $invoice->accion = "<a class='btn btn-primary btn-xs' data-task='view' href='factura/$invoice->public_id'  style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-eye-open'></i></a> <a class='btn btn-warning btn-xs' href='copia/$invoice->public_id' style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-duplicate'></i></a>";
  }
  $invoiceJson = ['data'=>$invoices];
  return Response::json($invoiceJson);

}

public function getServicios(){
  $servicios = Product::where('account_id', Auth::user()->account_id)->select('public_id','product_key', 'notes', 'cost',  'is_product', 'category_id')->where('is_product', 0)->orderBy('product_key', 'ASC')->get();
  foreach ($servicios as $key => $service) {
      $producOrService = $service->is_product?'producto':'servicio';
      $category_name = Category::where('account_id', Auth::user()->account_id)->select('name')->where('id', $service->category_id)->first();
      // $service->product_service = $producOrService;
      $service->category_name = $category_name->name;
      $service->accion = "<a class='btn btn-primary btn-xs' data-task='view' href='productos/$service->public_id'  style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-eye-open'></i></a> <a class='btn btn-warning btn-xs' href='productos/$service->public_id/edit' style='text-decoration:none;color:white;'><i class='glyphicon glyphicon-edit'></i></a>";
  }

  $serviceJson = ['data'=>$servicios];
  return Response::json($serviceJson);
}

public function llenarClients(){

    for ($i=0; $i < 50; $i++) {
      $client = Client::createNew();
        $client->setNit($i);
        $client->setName('cliente'.$i);
        $client->setBussinesName('nuevo'.$i);
        $client->setWorkPhone('22454545');
        $client->save();
   }
  return $client;
  }
}
