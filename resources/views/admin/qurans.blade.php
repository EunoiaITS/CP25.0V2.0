@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manage Quran</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/qurans/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Quran Ayat
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['qurans']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No quran ayats found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Quran Ayat List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Surah</th>
				        		<th>Verse</th>
				        		<th>Ayat (Arabic)</th>
				        		<th>Ayat (English)</th>
				        		<th>Ayat (Malay)</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['qurans'] as $quran) {
				      			$details = ['verse_no', 'surah_id'];
				      			
				      			foreach($quran->details()->get() as $detail)
				      				$details[$detail->key] = $detail->value;
				      			?>
						      	<tr>
							        <td><?php echo $count++; ?></td>
							        <td>{{ $details['surah_id'] }}</td>
							        <td>{{ $details['verse_no'] }}</td>
							        <td><?php echo $quran->trans_arabic; ?></td>
							        <td><?php echo $quran->trans_eng; ?></td>
							        <td><?php echo $quran->trans_malay; ?></td>
							        <td>
							        	<a href="{{ url('/admin/qurans/' . $quran->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminQuransController@destroy', $quran->id); ?>');">
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