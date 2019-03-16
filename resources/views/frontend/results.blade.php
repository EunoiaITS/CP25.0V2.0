<?php
$total = count($quran_links) + count($hadith_links) + count($manuscript_links) + count($article_links);
$food_details = ['def_title' => '', 'definition' => '', 'desc_title' => '', 'description' => '', 'image' => ''];

if($food)			      			
	foreach($food->details()->get() as $detail)
		$food_details[$detail->key] = $detail->value;

?>

@extends('frontend.master')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
			  <h1>We found <small>{{ $total }} results</small></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>

	<div class="row">

		<div class="col-md-2">

			<ul class="list-group">
			  <li class="list-group-item active" id="allLink">
			    <span class="badge">{{ $total }}</span>
			    <a class="link" style="color:#000;" href="#">All</a>
			  </li>
			  <li class="list-group-item" id="quranLink">
			    <span class="badge">{{ count($quran_links) }}</span>
			    <a class="link" style="color:#000;" href="#">Quran</a>
			  </li>
			  <li class="list-group-item" id="hadithLink">
			    <span class="badge">{{ count($hadith_links) }}</span>
			    <a class="link" style="color:#000;" href="#">Hadith</a>
			  </li>
			  <li class="list-group-item" id="manuLink">
			    <span class="badge">{{ count($manuscript_links) }}</span>
			    <a class="link" style="color:#000;" href="#">Manuscript</a>
			  </li>
			  <li class="list-group-item" id="articleLink">
			    <span class="badge">{{ count($article_links) }}</span>
			    <a class="link" style="color:#000;" href="#">Scientific Article</a>
			  </li>
			</ul>
		</div>

		<div class="col-md-7">
			
			<?php if($food) { ?>
			<!-- Prophetic Food Description -->
			  <h1><?php echo $food->title; ?></h1>
			  <hr>
	  		  <h3>Definition</h3>
			  <hr>
			  <p><?php if($food_details['definition'] != '')
		  			echo $food_details['definition'];
			  	else
			  		echo 'No definition found'; ?></p>
			  <h3>Description</h3>
			  <hr>
			  <p><small>
			  	<?php if($food_details['description'] != '')
		  			echo $food_details['description'];
			  	else
			  		echo 'No description found'; ?></small></p>
			<!-- Prophetic Food Description -->
			<?php } else { ?>
				<p class="alert alert-info">
			        {{ 'No matching prophetic food found!' }}
			    </p>
		    <?php } ?>

			<div id="all">
				<ol class="breadcrumb">
					<li class="active">Top Quran Results</li>
					<li><a class="link" href="#">View All</a></li>
				</ol>
				<?php
				$i = 0;
				if(count($quran_links) > 0) {
					foreach($quran_links as $link) {
						$i++;
						$quran = App\Content::findOrFail($link->content_id);
		      			$details = ['verse_no', 'surah_id'];
		      			
		      			foreach($quran->details()->get() as $detail)
		      				$details[$detail->key] = $detail->value;

	      				$surah = App\Surah::findOrfail($details['surah_id']); ?>
						
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								  <div class="panel-heading text-center">
								    <h3 class="panel-title">
								    	<?php echo $details['verse_no'] . ' : ' . $details['surah_id']
								    	. ' ' .$surah->surah . ' | ' . $surah->trans_english ; ?>
								    	<?php //echo $result->verse." : ".$result->surah->id." ".$result->surah->surah." | ".$result->surah->trans_english; ?></h3>
								  </div>
								  <div class="panel-body">
								  	<div class="row">
								    	<div class="col-md-2">
								    		Ayat
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $quran->trans_arabic; ?>
								    	</div>
								    </div>
								    <hr>

								    <div class="row">
								    	<div class="col-md-2">
								    		English Translation
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $quran->trans_eng; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-2">
								    		Malay Translation
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $quran->trans_malay; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-4 col-md-offset-8">
								    		<a href="#" class="btn btn-block btn-default link">Details</a>
								    	</div>
								    </div>

								  </div>
								</div>
							</div>
						</div>
				<!-- Result Item -->
						<?php if($i == 5) break;
					} 
				} else { ?>
					<p class="alert alert-info">
				        {{ 'No linked quran ayats found!' }}
				    </p>
			    <?php } ?>

				<!-- Quran Section Ends -->


				<!-- Hadith Section Begins -->

				<ol class="breadcrumb">
					<li class="active">Top Hadith Results</li>
					<li><a class="link" href="#">View All</a></li>
				</ol>

				<?php
				$i = 0;
				if(count($hadith_links) > 0) {
					foreach($hadith_links as $link) {
						$i++;
						$hadith = App\Content::findOrFail($link->content_id);
		      			$details = ['kitab' => '', 'bab' => '', 'vol' => '', 'page' => '', 'hadith_no' => ''];
		      			
		      			foreach($hadith->details()->get() as $detail)
		      				$details[$detail->key] = $detail->value; ?>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								  <div class="panel-heading text-center">
								    <h3 class="panel-title">
								    	<?php echo $details['kitab'] . ' > ' . $details['bab'] . ' > '
								    		. $details['vol'] . ' : ' . $details['page'] . ' | '
								    		. $details['hadith_no'] ?>
								    	<?php //echo $result->kitab." > ".$result->bab." > ".$result->vol." : ".$result->page." | ".$result->hadith_no; ?>
							    	</h3>
								  </div>
								  <div class="panel-body">
								  	<div class="row">
								    	<div class="col-md-2">
								    		Hadith
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $hadith->trans_arabic; ?>
								    	</div>
								    </div>
								    <hr>

								    <div class="row">
								    	<div class="col-md-2">
								    		English Translation
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $hadith->trans_eng; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-2">
								    		Malay Translation
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $hadith->trans_malay; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-4 col-md-offset-8">
								    		<a href="#" class="btn btn-block btn-default link">Details</a>
								    	</div>
								    </div>


								  </div>
								</div>
							</div>
						</div>
						<!-- Result Item -->
						<?php if($i == 5) break;
					}
				} else { ?>
					<p class="alert alert-info">
				        {{ 'No linked hadiths found!' }}
				    </p>
			    <?php } ?>

				<!-- Hadith Section Ends -->


				<!-- Manuscript Section Begins -->

				<ol class="breadcrumb">
					<li class="active">Top Manuscript Results</li>
					<li><a class="link" href="#">View All</a></li>
				</ol>

				<?php
				$i = 0;
				if(count($manuscript_links) > 0) {
					foreach($manuscript_links as $link) {
						$i++;
						$manuscript = App\Content::findOrFail($link->content_id);
		      			$details = ['manuscript_no' => '', 'bab' => '', 'page' => '', 'image' => ''];
		      			
		      			foreach($manuscript->details()->get() as $detail)
		      				$details[$detail->key] = $detail->value; ?>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								  <div class="panel-heading text-center">
								    <h3 class="panel-title">
								    	<?php echo $details['manuscript_no'] . ' > ' . $details['bab']
								    		. ' > ' . $details['page']; ?>
								    	<?php //echo $result->manuscript_no." > ".$result->bab." > ".$result->page; ?>
							    	</h3>
								  </div>
								  <div class="panel-body">
								  	<div class="row">
								    	<div class="col-md-2">
								    		Original Text
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $manuscript->trans_arabic; ?>
								    	</div>
								    </div>
								    <hr>

								    <div class="row">
								    	<div class="col-md-2">
								    		English
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $manuscript->trans_eng; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-2">
								    		Malay
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $manuscript->trans_malay; ?>
								    	</div>
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col-md-4 col-md-offset-8">
								    		<a href="#" class="btn btn-block btn-default link">Details</a>
								    	</div>
								    </div>


								  </div>
								</div>
							</div>
						</div>
						<!-- Result Item -->
						<?php if($i == 5) break;
					}
				} else { ?>
					<p class="alert alert-info">
				        {{ 'No linked manuscripts found!' }}
				    </p>
			    <?php } ?>

				<!-- Manuscript Section Ends -->

				<!-- Article Section Begins -->

				<ol class="breadcrumb">
					<li class="active">Top Scientific Article Results</li>
					<li><a class="link" href="#">View All</a></li>
				</ol>

				<?php
				$i = 0;
				if(count($article_links) > 0) {
					foreach($article_links as $link) {
						$i++;
						$article = App\Content::findOrFail($link->content_id);
		      			$details = ['author' => '', 'url' => '', 'disease_1' => '', 'disease_2' => '',
		      				'abstract' => '', 'concept' => ''];
		      			
		      			foreach($article->details()->get() as $detail)
		      				$details[$detail->key] = $detail->value; ?>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								  <div class="panel-heading text-center">
								    <h3 class="panel-title">
								    	<a class="link" href="#">
								    		<?php echo $details['disease_1'] . ' > ' . $details['disease_2']
								    		. ' > ' . $article->title; ?>
								    		<?php //echo $result->disease_1." > ".$result->disease_2." > ".$result->name; ?>
								    	</a>
								    </h3>
								  </div>
								  <div class="panel-body">
								  	<div class="row">
								    	<div class="col-md-2">
								    		Article Author / Published
								    	</div>
								    	<div class="col-md-10">
								    		<?php echo $details['author']; ?>
								    	</div>
								    </div>
								    <hr>

								    <div class="row">
								    	<div class="col-md-2">
								    		Abstract Content
								    	</div>
								    	<div class="col-md-10">
								    		<?php 
								    		if(strlen($details['abstract'])>300){
								    			echo substr($details['abstract'], 0,300)."...";
								    		}else{
								    			echo $details['abstract'];
								    		}
								    		?>
								    	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-2">
								    		Concept
								    	</div>
								    	<div class="col-md-10">
								    		<?php 
								    		if(strlen($details['concept'])>300){
								    			echo substr($details['concept'], 0,300)."...";
								    		}else{
								    			echo $details['concept'];
								    		}
								    		?>

								    	</div>
								    </div>
								    
								    <hr>
								    <div class="row">
								    	<div class="col-md-4 col-md-offset-8">
								    		<a href="#" class="btn btn-block btn-default link">Details</a>
								    	</div>
								    </div>


								  </div>
								</div>
							</div>
						</div>
						<!-- Result Item -->
						<?php if($i == 5) break;
					}
				} else { ?>
					<p class="alert alert-info">
				        {{ 'No linked scientific articles found!' }}
				    </p>
			    <?php } ?>

				<!-- Article Section Ends -->

			</div>
			<!-- All ends -->

			<!-- **Quran DIV** -->
			
			<!-- **Quran DIV ends** -->

			<!-- **Hadith DIV** -->
			
			<!-- **Hadith DIV Ends** -->

			<!-- **Manuscript DIV** -->
			
			<!-- **Manuscript DIV ends** -->

			<!-- **Article DIV** -->
			
			<!-- **Article DIV ends** -->

		</div>
		<!-- left side of search ends -->

		<div class="col-md-3">
			<!-- Prophetic Food Panel -->
			<div id="rightPanel" class="panel panel-default">
				<div class="panel-body">
					<?php if($food) { ?>
						<div class="food_heading">
							<i><?php echo $food->title ?></i>
						</div>
						<div class="food_image">
							@if($food_details['image'])
					        	<img src="{{ url('/public/uploads') . '/' . $food_details['image'] }}" width="100%"
					        		alt="">
			        		@endif
						</div>
						<div class="food_heading">
							Translation
						</div>
						<div class="food_table">
							<table class="table table-striped table-responsive">
								<tr>
									<th>Scientific Term</th>
									<td><?php echo $food->trans_eng; ?></td>
								</tr>
								<tr>
									<th>Arabic</th>
									<td><?php echo $food->trans_arabic; ?></td>
								</tr>
								<tr>
									<th>Bahasa Malaysia</th>
									<td><?php echo $food->trans_malay; ?></td>
								</tr>
							</table>
						</div>
						<div class="food_heading">
							Sources
						</div>
						<div class="food_table">
							<table class="table table-striped table-responsive">
								<tr>
									<th>Quran</th>
									<td>
										<?php if(count($quran_links) > 0){ ?>
										<a class="link" href="#">
											<?php echo count($quran_links); ?> Results
										</a>
										<?php }else{ ?>
										0 Results
										<?php } ?>
									</td>
								</tr>
								<tr>
									<th>Hadith</th>
									<td>
										<?php if(count($hadith_links) > 0){ ?>
										<a class="link" href="#">
											<?php echo count($hadith_links); ?> Results
										</a>
										<?php }else{ ?>
										0 Results
										<?php } ?>
									</td>
								</tr>
								<tr>
									<th>Manuscripts</th>
									<td>
										<?php if(count($manuscript_links) > 0){ ?>
										<a class="link" href="#">
											<?php echo count($manuscript_links); ?> Results
										</a>
										<?php }else{ ?>
										0 Results
										<?php } ?>
									</td>
								</tr>
								<tr>
									<th>Scientific Articles</th>
									<td>
										<?php if(count($article_links) > 0){ ?>
										<a class="link" href="#">
											<?php echo count($article_links); ?> Results
										</a>
										<?php }else{ ?>
										0 Results
										<?php } ?>
									</td>
								</tr>
							</table>
						</div>

						<div class="food_heading">
							Nexus of Knowledge
						</div>
						<div class="food_table">
						</div>

						<div class="food_heading">
							Synonyms / Similar Prophetic Foods
						</div>
						<div class="food_synonyms">
						</div>
						<canvas id="viewport" width="300" height="400"></canvas>
					<?php } else { ?>
						<p class="alert alert-info">
					        {{ 'No matching prophetic food found!' }}
					    </p>
				    <?php } ?>
				</div>
			</div>
			<!-- Prophetic Food Panel Ends here -->
		</div>
		<!-- right side of search ends -->
	</div>
	<!-- main row ends -->
</div>


@endsection