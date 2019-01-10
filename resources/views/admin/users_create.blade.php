@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/users') }}">Manage Users</a></li>
	  	<li class="active">Create User</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New User
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminUsersController@store') }}" method="post" class="form-horizontal form-groups-bordered">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Name</label>

		                    <div class="col-sm-6">
	                            <input type="text" class="form-control" name="name" value="" autofocus required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Email</label>

		                    <div class="col-sm-6">
	                            <input type="email" class="form-control" name="email" value="" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Password</label>

		                    <div class="col-sm-6">
	                            <input type="password" class="form-control" name="password" value="" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Role</label>

		                    <div class="col-sm-6">
		                        <select name="role" class="form-control" required>
		                            <option value="">Select a role</option>
		                            <option value="admin">Admin</option>
		                            <option value="author">Author</option>
		                        </select>
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