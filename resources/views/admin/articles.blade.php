@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Manage Scientific Articles</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/articles/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Scientific Article
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['articles']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No scientific articles found!' }}
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
				      		foreach($page_data['articles'] as $article) {
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
							        	<a href="{{ url('/admin/articles/' . $article->id . '/edit') }}" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminArticlesController@destroy', $article->id); ?>');">
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