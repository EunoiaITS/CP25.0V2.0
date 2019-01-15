@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Events</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/events/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Event
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['events']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No events found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Events List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Event Title / Name</th>
				        		<th>Event Description</th>
				        		<th>Event Address</th>
				        		<th>Event Dates</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['events'] as $event) {
				      			$date_from = '';
				      			$date_till = '';

				      			if($event->date_from)
				      				$date_from = date('d/m/Y', $event->date_from);

				      			if($event->date_till)
				      				$date_till = date('d/m/Y', $event->date_till);
				      		 	?>
						      	<tr>
							        <td>{{ $count++ }}</td>
							        <td>{{ $event->title }}</td>
							        <td><?php echo  $event->description; ?></td>
							        <td>{{ $event->address }}</td>
							        <td>{{ $date_from . ' - ' . $date_till }}</td>
							        <td>
							        	<a href="{{ url('/admin/events/' . $event->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminEventsController@destroy', $event->id); ?>');">
			                                Delete
			                            </a>
						        	</td>
						      	</tr>
					      	<?php } ?>
				    	</tbody>
				  	</table>
				</div>
			</div>
		</div>
	@endif

@endsection