@extends('header')

@section('title') Registro de Usuario @stop

@section('head')
	
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE2/plugins/select2/select2.min.css')}}">
    <script src="{{ asset('vendor/AdminLTE2/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
@stop

@section('content')

	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title">Default Box Example</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      <span class="label label-primary">Label</span>

	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <h3>keyrus work! </h3>
	 	

	    <div class="form-group">
                    <label>Disabled Result</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option disabled="disabled">California (disabled)</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div><!-- /.form-group -->


	  </div><!-- /.box-body -->
	  <div class="box-footer">
	    The footer of the box
	  </div><!-- box-footer -->
	</div><!-- /.box -->
		 
	 	
@stop 