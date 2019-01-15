@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/advertisements') }}">Advertisements</a></li>
	  	<li class="active">Create Advertisement</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Advertisement
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminAdvertisementsController@store') }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@csrf

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Advertisement Image</label>

		                    <div class="col-sm-6">
	                            <input type="file" name="image" accept="image/*" style="margin-top: 7px;" required="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">URL</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="url" value="" required="" 
	                            	placeholder="Advertisement Link">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Advertisement Position</label>

		                    <div class="col-sm-6">
	                            <input type="number" class="form-control" name="position" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-6">
		                        <button type="submit" class="btn btn-success">Submit</button>
		                    </div>
		                </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

@endsection