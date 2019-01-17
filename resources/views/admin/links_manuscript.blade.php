@php
	use App\Content;
@endphp

@if($page_data['manuscript_links']->isEmpty())
	<p class="alert alert-info">
        {{ 'No linked manuscripts found!' }}
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
			      		foreach($page_data['manuscript_links'] as $link) {
			      			$manuscript = Content::findOrFail($link->content_id);
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
						        	<a href="{{ url('/admin/keywords/' . $link->id . '/unlink') }}"
						        		class="btn btn-sm btn-danger">
		                                Unlink
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