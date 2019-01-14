@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Prophetic Food</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/foods/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Prophetic Food
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['foods']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No prophetic foods found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Prophetic Foods List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Food</th>
				        		<th>Arabic Translation</th>
				        		<th>English Translation</th>
				        		<th>Malay Translation</th>
				        		<th>Image</th>
				        		<th>Definition Title</th>
				        		<th>Definition</th>
				        		<th>Description Title</th>
				        		<th>Description</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['foods'] as $food) {
				      			$details = ['def_title' => '', 'definition' => '', 'desc_title' => '',
				      				'description' => '', 'image' => ''];
				      			
				      			foreach($food->details()->get() as $detail)
				      				$details[$detail->key] = $detail->value;
				      			?>
						      	<tr>
							        <td><?php echo $count++; ?></td>
							        <td><?php echo $food->title; ?></td>
							        <td><?php echo $food->trans_arabic; ?></td>
							        <td><?php echo $food->trans_eng; ?></td>
							        <td><?php echo $food->trans_malay; ?></td>
							        <td>
							        	@if($details['image'])
								        	<img src="{{ url('/public/uploads') . '/' . $details['image'] }}" height="100"
								        		alt="">
						        		@endif
							    	</td>
							        <td>{{ $details['def_title'] }}</td>
							        <td>{{ $details['definition'] }}</td>
							        <td>{{ $details['desc_title'] }}</td>
							        <td>{{ $details['description'] }}</td>
							        <td>
							        	<a href="{{ url('/admin/foods/' . $food->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminFoodsController@destroy', $food->id); ?>');">
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