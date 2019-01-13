@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/hadiths') }}">Hadith</a></li>
	  	<li class="active">Create Hadith</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Hadith
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminHadithsController@store') }}" method="post" class="form-horizontal form-groups-bordered">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Hadith (Arabic)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_arabic" rows="3" required></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Hadith (Malay)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_malay" rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Hadith (English)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_eng" rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Kitab</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="kitab" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Bab</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="bab" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Vol</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="vol" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Page</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="page" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Hadith No.</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="hadith_no" value="">
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