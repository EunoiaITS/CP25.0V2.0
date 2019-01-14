@extends('layouts.master')

@section('content')

	@php
		$food    = $page_data['food'];
		$details = ['def_title' => '', 'definition' => '', 'desc_title' => '', 'description' => '', 'image' => ''];
				      			
		foreach($food->details()->get() as $detail)
			$details[$detail->key] = $detail->value;
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/foods') }}">Prophetic Food</a></li>
	  	<li class="active">Edit Prophetic Food</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Prophetic Food
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminFoodsController@update', $food->id) }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@method('PUT')
	            		@csrf
	            		<div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Food</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title" value="{{ $food->title }}"
	                        		autofocus="" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Arabic Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_arabic"
	                            	rows="3">{{ $food->trans_arabic }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">English Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_eng"
	                            	rows="3">{{ $food->trans_eng }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Malay Translation</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_malay"
	                            	rows="3">{{ $food->trans_malay }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Definition Title</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="def_title"
	                            	value="{{ $details['def_title'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Definition</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="definition"
	                            	rows="3">{{ $details['definition'] }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description Title</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="desc_title"
	                            	value="{{ $details['desc_title'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Description</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="description"
	                            	rows="3">{{ $details['description'] }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Image</label>

		                    @if($details['image'])
		                    	<div class="col-sm-3">
			                    	<img src="{{ url('/public/uploads') . '/' . $details['image'] }}" height="100" alt="">
			                    </div>
	                    	@endif

		                    <div class="<?php if($details['image']) echo 'col-sm-offset-3'; ?> col-sm-6">
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