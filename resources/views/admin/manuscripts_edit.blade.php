@extends('layouts.master')

@section('content')

	@php
		$manuscript = $page_data['manuscript'];
		$details 	= ['manuscript_no' => '', 'bab' => '', 'page' => '', 'image' => ''];
				      			
		foreach($manuscript->details()->get() as $detail)
			$details[$detail->key] = $detail->value;
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/manuscripts') }}">Manuscript</a></li>
	  	<li class="active">Edit Manuscript</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Manuscript
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminManuscriptsController@update', $manuscript->id) }}" method="post"
	            		class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	            		@method('PUT')
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Original Text</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_arabic"
	                            	rows="3" required>{{ $manuscript->trans_arabic }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Manuscript (Malay)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_malay"
	                            	rows="3">{{ $manuscript->trans_malay }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Manuscript (English)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_eng"
	                            	rows="3">{{ $manuscript->trans_eng }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Manuscript No.</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="manuscript_no"
	                            	value="{{ $details['manuscript_no'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Bab</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="bab" value="{{ $details['bab'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Page</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="page" value="{{ $details['page'] }}">
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