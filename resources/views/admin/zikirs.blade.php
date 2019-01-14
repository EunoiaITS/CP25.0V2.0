@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manage Zikir</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/zikirs/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Zikir
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['zikirs']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No zikirs found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Zikir List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Zikir</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['zikirs'] as $zikir) {
				      			$details = [];
				      			
				      			foreach($zikir->details()->get() as $detail)
				      				$details[$detail->key] = $detail->value;
				      			?>
						      	<tr>
							        <td><?php echo $count++; ?></td>
							        <td><?php echo $zikir->title; ?></td>
							        <td>
							        	<a href="{{ url('/admin/zikirs/' . $zikir->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminZikirsController@destroy', $zikir->id); ?>');">
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