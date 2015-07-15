@extends('header')

@section('content') 
	
	

<div class="row">
  <div class="col-md-12">
  <h3>Users</h3>
  {{ $table->render() }}
  {{ $table->script() }}
  </div>
</div>


@stop