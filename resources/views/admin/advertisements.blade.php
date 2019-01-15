@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Advertisements</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/advertisements/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Advertisement
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['advertisements']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No advertisements found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Advertisements List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Advertisement Image</th>
				        		<th>URL</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['advertisements'] as $advertisement) { ?>
						      	<tr>
							        <td>{{ $count++ }}</td>
							        <td>
							        	@if($advertisement->image)
								        	<img src="{{ url('/public/uploads') . '/' . $advertisement->image }}"
								        		height="200" alt="">
						        		@endif
							    	</td>
							        <td>{{ $advertisement->url }}</td>
							        <td>
							        	<a href="{{ url('/admin/advertisements/' . $advertisement->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminAdvertisementsController@destroy', $advertisement->id); ?>');">
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