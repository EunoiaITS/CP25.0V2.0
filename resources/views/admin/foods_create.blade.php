@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/foods') }}">Prophetic Food</a></li>
	  	<li class="active">Create Prophetic Food</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Prophetic Food
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminFoodsController@store') }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Food</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title" value="" autofocus="" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Arabic Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_arabic"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">English Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_eng"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Malay Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_malay"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Definition Title</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="def_title" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Definition</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="definition"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description Title</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="desc_title" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="description"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Image</label>

		                    <div class="col-sm-6">
	                            <input type="file" name="image" accept="image/*" style="margin-top: 7px;">
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