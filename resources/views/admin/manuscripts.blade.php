@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manuscript</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/manuscripts/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Manuscript
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['manuscripts']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No manuscripts found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Manuscripts List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Manuscript No.</th>
				        		<th>Bab</th>
				        		<th>Page</th>
				        		<th>Image</th>
				        		<th>Original Text</th>
				        		<th>English</th>
				        		<th>Malay</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['manuscripts'] as $manuscript) {
				      			$details = ['manuscript_no' => '', 'bab' => '', 'page' => '', 'image' => ''];
				      			
				      			foreach($manuscript->details()->get() as $detail)
				      				$details[$detail->key] = $detail->value;
				      			?>
						      	<tr>
							        <td><?php echo $count++; ?></td>
							        <td>{{ $details['manuscript_no'] }}</td>
							        <td>{{ $details['bab'] }}</td>
							        <td>{{ $details['page'] }}</td>
							        <td>
							        	@if($details['image'])
								        	<img src="{{ url('/public/uploads') . '/' . $details['image'] }}"
								        		height="100" alt="">
						        		@endif
							    	</td>
							        <td><?php echo $manuscript->trans_arabic; ?></td>
							        <td><?php echo $manuscript->trans_eng; ?></td>
							        <td><?php echo $manuscript->trans_malay; ?></td>
							        <td>
							        	<a href="{{ url('/admin/manuscripts/' . $manuscript->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminManuscriptsController@destroy', $manuscript->id); ?>');">
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