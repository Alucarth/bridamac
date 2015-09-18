@extends('layout')

@section('title') Registro de Usuario @stop

@section('head')
	
@stop

@section('body')	 
	<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> {{Auth::user()->account->name}}
                <small class="pull-right">Date: {{date("d/m/Y")}}</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
               De
              <address>
                <strong>{{Auth::user()->account->name}}</strong><br>
                {{Branch::find(Session::get('branch_id'))->address1}}}<br>
                 {{Branch::find(Session::get('branch_id'))->address2}}}<br>
                Telefono:  {{Branch::find(Session::get('branch_id'))->work_phone}}}<br>
           
              </address>
            </div><!-- /.col -->
          

       
        
            <div class="col-xs-6">
              <p class="lead">Factura N° ----</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </tbody></table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
        
	Factura Emitida por : {{Auth::user()->account->name}}

	 <a class="btn btn-info" href="{{ $link }}"> VER FACTURA  </a>
	 
@stop