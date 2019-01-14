@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/articles') }}">Scientific Articles</a></li>
	  	<li class="active">Create Scientific Article</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Scientific Article
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminArticlesController@store') }}" method="post" class="form-horizontal form-groups-bordered">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article Title / Name</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title" value="" autofocus="" required="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article Author / Publisher</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="author" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article URL</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="url" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Disease 1</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="disease_1" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Disease 2</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="disease_2" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Abstract</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="abstract"
	                            	rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Concept</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="concept"
	                            	rows="3"></textarea>
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