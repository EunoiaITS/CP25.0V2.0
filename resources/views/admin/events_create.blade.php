@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/events') }}">Events</a></li>
	  	<li class="active">Create Event</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Event
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminEventsController@store') }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Event Title / Name</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title" value="" autofocus="" required="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Address</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="address" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description</label>

		                    <div class="col-sm-9">
	                            <textarea class="form-control summernote" name="description"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Date From</label>

		                    <div class="col-sm-6">
	                            <input type="date" class="form-control" name="date_from" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Date Till</label>

		                    <div class="col-sm-6">
	                            <input type="date" class="form-control" name="date_till" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Image</label>

		                    <div class="col-sm-6">
	                            <input type="file" name="image" accept="image/*" style="margin-top: 7px;" required="">
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