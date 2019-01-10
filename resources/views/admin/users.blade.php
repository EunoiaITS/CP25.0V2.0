@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manage Users</li>
	</ol>

	@if(session()->has('success_message'))
        <p class="alert alert-success">
            {{ session()->get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/users/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New User
	</a>
	<div class="clearfix"></div><br>

	<div class="panel panel-primary">
		<div class="panel-heading">
    		<h3 class="panel-title">Users List</h3>
  		</div>
		<div class="panel-body">
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
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminUsersController@destroy', $user->id); ?>');">
			                                Delete
			                            </a>
									@endif
					        	</td>
					      	</tr>
				      	<?php } ?>
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>

@endsection