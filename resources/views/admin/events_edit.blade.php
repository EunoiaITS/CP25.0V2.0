@extends('layouts.master')

@section('content')
	
	@php
		$event = $page_data['event'];
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/events') }}">Events</a></li>
	  	<li class="active">Edit Event</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Event
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminEventsController@update', $event->id) }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@method('PUT')
	            		@csrf
	            		<div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Event Title / Name</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title"
	                            	value="{{ $event->title }}" autofocus="" required="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Address</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="address" value="{{ $event->address }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description</label>

		                    <div class="col-sm-9">
	                            <textarea class="form-control summernote"
	                            	name="description">{{ $event->description }}</textarea>
		                    </div>
		                </div>
		                
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Date From</label>

		                    <div class="col-sm-6">
	                            <input type="date" class="form-control" name="date_from"
	                            	value="{{ date('Y-m-d', $event->date_from) }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Date Till</label>

		                    <div class="col-sm-6">
	                            <input type="date" class="form-control" name="date_till"
	                            	value="{{ date('Y-m-d', $event->date_till) }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Image</label>

		                    @if($event->image)
		                    	<div class="col-sm-3">
			                    	<img src="{{ url('/public/uploads') . '/' . $event->image }}" height="100" alt="">
			                    </div>
	                    	@endif

		                    <div class="<?php if($event->image) echo 'col-sm-offset-3'; ?> col-sm-6">
	                            <input type="file" name="image" accept="image/*" style="margin-top: 7px;">
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