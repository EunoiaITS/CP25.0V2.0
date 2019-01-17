@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li class="active">Keywords</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

	<a href="{{ url('/admin/keywords/create') }}" class="btn btn-primary pull-right" style="background: black;">
		<i class="fa fa-plus-circle"></i> Create New Keyword
	</a>
	<div class="clearfix"></div><br>

	@if($page_data['keywords']->isEmpty())
		<p class="alert alert-info">
	        {{ 'No keywords found!' }}
	    </p>
    @else
		<div class="panel panel-primary">
			<div class="panel-heading">
	    		<h3 class="panel-title">Keywords List</h3>
	  		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped" style="width:100%">
				    	<thead>
				      		<tr>
				        		<th>#</th>
				        		<th>Keyword</th>
				        		<th>Quran</th>
				        		<th>Hadith</th>
				        		<th>Manuscript</th>
				        		<th>Scientific Articles</th>
				        		<th>Options</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    		$count = 1;
				      		foreach($page_data['keywords'] as $keyword) {
				      			$quran_ids = $keyword->links()->where('content_type', 'quran')->get()
				      				->implode('content_id', ', ');
			      				$hadith_ids = $keyword->links()->where('content_type', 'hadith')->get()
				      				->implode('content_id', ', ');
			      				$manuscript_ids = $keyword->links()->where('content_type', 'manuscript')->get()
				      				->implode('content_id', ', ');
			      				$article_ids = $keyword->links()->where('content_type', 'article')->get()
				      				->implode('content_id', ', ');
				      		 	?>
						      	<tr>
							        <td>{{ $count++ }}</td>
							        <td>{{ $keyword->name }}</td>
							        <td>{{ $quran_ids }}</td>
							        <td>{{ $hadith_ids }}</td>
							        <td>{{ $manuscript_ids }}</td>
							        <td>{{ $article_ids }}</td>
							        <td style="display: inline-flex;">
							        	<a href="{{ url('/admin/keywords/' . $keyword->id . '/manage') }}"
							        		class="btn btn-sm btn-success">
			                                Manage
			                            </a>
							        	<a href="{{ url('/admin/keywords/' . $keyword->id . '/edit') }}"
							        		style="margin: 0px 5px;" class="btn btn-sm btn-default">
			                                Edit
			                            </a>
						        		<a href="#" class="btn btn-sm btn-danger"
											onclick="confirm_modal_hard_reload('<?php echo action('AdminKeywordsController@destroy', $keyword->id); ?>');">
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