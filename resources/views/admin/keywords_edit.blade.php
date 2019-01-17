@extends('layouts.master')

@section('content')
	
	@php
		$keyword = $page_data['keyword'];
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/keywords') }}">Keywords</a></li>
	  	<li class="active">Edit Keyword</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Keyword
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminKeywordsController@update', $keyword->id) }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@method('PUT')
	            		@csrf
	            		<div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Keyword</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="name"
	                            	value="{{ $keyword->name }}" autofocus="" required="">
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