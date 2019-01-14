@extends('layouts.master')

@section('content')

	@php
		$zikir  = $page_data['zikir'];
		$details = [];
				      			
		foreach($zikir->details()->get() as $detail)
			$details[$detail->key] = $detail->value;
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/zikirs') }}">Zikir</a></li>
	  	<li class="active">Edit Zikir</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Zikir
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminZikirsController@update', $zikir->id) }}" method="post" class="form-horizontal form-groups-bordered">
	            		@method('PUT')
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Zikir</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="title"
	                            	rows="3" autofocus required>{{ $zikir->title }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-6">
		                        <button type="submit" class="btn btn-success">Update</button>
		                    </div>
		                </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

@endsection