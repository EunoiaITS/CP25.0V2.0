@php
	use App\Content;
@endphp

@if($page_data['article_links']->isEmpty())
	<p class="alert alert-info">
        {{ 'No linked scientific articles found!' }}
    </p>
@else
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<h3 class="panel-title">Scientific Articles List</h3>
  		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">
			    	<thead>
			      		<tr>
			        		<th>#</th>
			        		<th>Article Title / Name</th>
			        		<th>Article Author / Publisher</th>
			        		<th>Article URL</th>
			        		<th>Disease 1</th>
			        		<th>Disease 2</th>
			        		<th>Abstract</th>
			        		<th>Concept</th>
			        		<th>Options</th>
			      		</tr>
			    	</thead>
			    	<tbody>
			    		<?php
			    		$count = 1;
			      		foreach($page_data['article_links'] as $link) {
			      			$article = Content::findOrFail($link->content_id);
			      			$details = ['author' => '', 'url' => '', 'disease_1' => '', 'disease_2' => '',
			      				'abstract' => '', 'concept' => ''];
			      			
			      			foreach($article->details()->get() as $detail)
			      				$details[$detail->key] = $detail->value;
			      			?>
					      	<tr>
						        <td><?php echo $count++; ?></td>
						        <td>{{ $article->title }}</td>
						        <td>{{ $details['author'] }}</td>
						        <td>{{ $details['url'] }}</td>
						        <td>{{ $details['disease_1'] }}</td>
						        <td>{{ $details['disease_2'] }}</td>
						        <td>{{ $details['abstract'] }}</td>
						        <td>{{ $details['concept'] }}</td>
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