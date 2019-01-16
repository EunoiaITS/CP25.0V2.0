@extends('layouts.master')

@section('content')

	
	<?php
	Use App\Content;
	echo '<pre>'; print_r(Content::where('type', 'quran')->get(['id'])->toArray());
	$quran_ids = Content::where('type', 'quran')->get(['id'])->toArray();

	echo '<pre>';
	foreach($quran_ids as $id) {
		
		echo Content::where('id', $id)->firstOrFail()->trans_arabic . '<br>';
		//echo Content::findOrFail($id);
		//echo $content->trans_arabic;
		//$content = Content::findOrFail($id);
		//print_r($content);
		// foreach($content as $quran) {
			
		// 	echo $quran['trans_arabic'] . '<br>';
		// }
		//echo $content->trans_arabic . '<br>';
	}
	?>
	

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manage Hadith</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/hadiths/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Hadith
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['hadiths']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No hadiths found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Hadith List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Kitab</th>
				        		<th>Bab</th>
				        		<th>Vol</th>
				        		<th>Page</th>
				        		<th>Hadith No.</th>
				        		<th>Hadith (Arabic)</th>
				        		<th>Hadith (English)</th>
				        		<th>Hadith (Malay)</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['hadiths'] as $hadith) {
				      			$details = ['kitab' => '', 'bab' => '', 'vol' => '', 'page' => '', 'hadith_no' => ''];
				      			
				      			foreach($hadith->details()->get() as $detail)
				      				$details[$detail->key] = $detail->value;
				      			?>
						      	<tr>
							        <td><?php echo $count++; ?></td>
							        <td>{{ $details['kitab'] }}</td>
							        <td>{{ $details['bab'] }}</td>
							        <td>{{ $details['vol'] }}</td>
							        <td>{{ $details['page'] }}</td>
							        <td>{{ $details['hadith_no'] }}</td>
							        <td><?php echo $hadith->trans_arabic; ?></td>
							        <td><?php echo $hadith->trans_eng; ?></td>
							        <td><?php echo $hadith->trans_malay; ?></td>
							        <td>
							        	<a href="{{ url('/admin/hadiths/' . $hadith->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminHadithsController@destroy', $hadith->id); ?>');">
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