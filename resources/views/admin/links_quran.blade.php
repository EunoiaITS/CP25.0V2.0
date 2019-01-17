@php
	use App\Content;
@endphp

@if($page_data['quran_links']->isEmpty())
	<p class="alert alert-info">
        {{ 'No linked quran ayats found!' }}
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
			      		foreach($page_data['quran_links'] as $link) {
			      			$quran = Content::findOrFail($link->content_id);
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