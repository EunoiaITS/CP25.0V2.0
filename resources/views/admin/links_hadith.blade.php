@php
	use App\Content;
@endphp

@if($page_data['hadith_links']->isEmpty())
	<p class="alert alert-info">
        {{ 'No linked hadiths found!' }}
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
			      		foreach($page_data['hadith_links'] as $link) {
			      			$hadith = Content::findOrFail($link->content_id);
			      			$details = ['kitab' => '', 'bab' => '', 'vol' => '', 'page' => '',
			      				'hadith_no' => ''];
			      			
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