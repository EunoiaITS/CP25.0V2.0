@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="/admin">Dashboard</a></li>
	  	<li class="active">Manage Users</li>
	</ol>

	@if(session()->has('success_message'))
        <p class="alert alert-success">
            {{ session()->get('success_message') }}
        </p>
    @endif

	<a href="/admin/users/create" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New User
	</a>
	<div class="clearfix"></div><br>



	<div class="table-responsive">
		<table id="example" class="table table-striped" style="width:100%">
	    	<thead>
	      		<tr>
	        		<th>#</th>
	        		<th>Name</th>
	        		<th>Email</th>
	        		<th>Role</th>
	        		<th>Options</th>
	      		</tr>
	    	</thead>
	    	<tbody>
	    		<?php
	    		$count = 1;
	      		foreach($page_data['users'] as $user) { ?>
			      	<tr>
				        <td><?php echo $count++; ?></td>
				        <td><?php echo $user->name; ?></td>
				        <td><?php echo $user->email; ?></td>
				        <td><?php echo $user->role; ?></td>
				        <td>
				        	@if($user->role != 'admin')
					        	<form action="{{ action('AdminUsersController@destroy', $user->id) }}" method="POST">
								    @method('DELETE')
								    @csrf
								    <input type="submit" name="submit" class="btn btn-sm btn-danger" value="Delete">
								</form>
							@endif
			        	</td>
			      	</tr>
		      	<?php } ?>
	    	</tbody>
	  	</table>
	</div>

@endsection