@extends('layouts.master')

@section('content')

	@php
		$article = $page_data['article'];
		$details = ['author' => '', 'url' => '', 'disease_1' => '', 'disease_2' => '', 'abstract' => '', 'concept' => ''];
				      			
		foreach($article->details()->get() as $detail)
			$details[$detail->key] = $detail->value;
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/articles') }}">Scientific Articles</a></li>
	  	<li class="active">Edit Scientific Article</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Edit Scientific Article
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminArticlesController@update', $article->id) }}" method="post" class="form-horizontal form-groups-bordered">
	            		@method('PUT')
	            		@csrf
	            		<div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article Title / Name</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="title" value="{{ $article->title }}"
	                            	autofocus="" required="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article Author / Publisher</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="author" value="{{ $details['author'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Article URL</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="url" value="{{ $details['url'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Disease 1</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="disease_1"
	                            	value="{{ $details['disease_1'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Disease 2</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="disease_2"
	                            	value="{{ $details['disease_2'] }}">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Abstract</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="abstract"
	                            	rows="3">{{ $details['abstract'] }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Concept</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="concept"
	                            	rows="3">{{ $details['concept'] }}</textarea>
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