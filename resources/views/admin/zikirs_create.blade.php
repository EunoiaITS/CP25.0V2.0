@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/zikirs') }}">Zikir</a></li>
	  	<li class="active">Create Zikir</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Zikir
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminZikirsController@store') }}" method="post" class="form-horizontal form-groups-bordered">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Zikir</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="title" rows="3"
	                            	autofocus required></textarea>
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