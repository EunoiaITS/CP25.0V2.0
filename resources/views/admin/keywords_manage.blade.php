@extends('layouts.master')

@section('content')

	@php
		use App\Content;
		$keyword_id = $page_data['keyword_id'];
	@endphp

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/keywords') }}">Keywords</a></li>
	  	<li class="active">Manage Keywords</li>
	</ol>

	@if(Session::has('success_message'))
        <p class="alert alert-success">
            {{ Session::get('success_message') }}
        </p>
    @endif

    <form action="{{ action('AdminKeywordsController@link') }}" method="post"
    	class="form-horizontal form-groups-bordered">
		@csrf

        <div class="form-group">

            <div class="col-sm-offset-4 col-sm-4">
                <select name="content_id" class="form-control" required>
                    <option value="">Select a quran ayat</option>
                    <?php
                    $qurans = Content::where('type', 'quran')->get();

                    foreach($qurans as $quran) {
                    	$linked = $quran->links()->where('keyword_id', $keyword_id)->get();
                    	if($linked->isEmpty()) {
                    		$details = ['verse_no' => '', 'surah_id' => ''];

                    		foreach($quran->details()->get() as $detail)
								$details[$detail->key] = $detail->value;
							?>
	                    	<option value="<?php echo $quran->id; ?>">
	                    		{{ $details['surah_id'] . ':' . $details['verse_no'] }}
	                    	</option>
                    	<?php }
            	 	} ?>
                </select>
            </div>

            <input type="hidden" name="keyword_id" value="{{ $keyword_id }}">
            <input type="hidden" name="content_type" value="quran">

            <div class="col-sm-2">
                <button type="submit" class="btn btn-success" style="width: 100%;">Link Quran Ayat</button>
            </div>
        </div>
    </form>

    <form action="{{ action('AdminKeywordsController@link') }}" method="post"
    	class="form-horizontal form-groups-bordered">
		@csrf

        <div class="form-group">

            <div class="col-sm-offset-4 col-sm-4">
                <select name="content_id" class="form-control" required>
                    <option value="">Select a hadith</option>
                    <?php
                    $hadiths = Content::where('type', 'hadith')->get();

                    foreach($hadiths as $hadith) {
                    	$linked = $hadith->links()->where('keyword_id', $keyword_id)->get();
                    	if($linked->isEmpty()) {
                    		$details = ['kitab' => '', 'bab' => '', 'vol' => '', 'page' => '',
                    			'hadith_no' => ''];

                    		foreach($hadith->details()->get() as $detail)
								$details[$detail->key] = $detail->value;
							?>
	                    	<option value="<?php echo $hadith->id; ?>">
	                    		{{ $details['kitab'] . ' > ' . $details['bab'] . ' > '
	                    			. $details['page'] . ' > ' . $details['hadith_no'] }}
	                    	</option>
                    	<?php }
            	 	} ?>
                </select>
            </div>

            <input type="hidden" name="keyword_id" value="{{ $keyword_id }}">
            <input type="hidden" name="content_type" value="hadith">

            <div class="col-sm-2">
                <button type="submit" class="btn btn-success" style="width: 100%;">Link Hadith</button>
            </div>
        </div>
    </form>

    <form action="{{ action('AdminKeywordsController@link') }}" method="post"
    	class="form-horizontal form-groups-bordered">
		@csrf

        <div class="form-group">

            <div class="col-sm-offset-4 col-sm-4">
                <select name="content_id" class="form-control" required">
                    <option value="">Select a manuscript</option>
                    <?php
                    $manuscripts = Content::where('type', 'manuscript')->get();

                    foreach($manuscripts as $manuscript) {
                    	$linked = $manuscript->links()->where('keyword_id', $keyword_id)->get();
                    	if($linked->isEmpty()) {
                    		$details = ['manuscript_no' => '', 'bab' => '', 'page' => '', 'image' => ''];

                    		foreach($manuscript->details()->get() as $detail)
								$details[$detail->key] = $detail->value;
							?>
	                    	<option value="<?php echo $manuscript->id; ?>">
	                    		{{ $details['manuscript_no'] . ' > ' . $details['bab'] . ' > '
	                    			. $details['page'] }}
	                    	</option>
                    	<?php }
            	 	} ?>
                </select>
            </div>

            <input type="hidden" name="keyword_id" value="{{ $keyword_id }}">
            <input type="hidden" name="content_type" value="manuscript">

            <div class="col-sm-2">
                <button type="submit" class="btn btn-success" style="width: 100%;">Link Manuscript</button>
            </div>
        </div>
    </form>

    <form action="{{ action('AdminKeywordsController@link') }}" method="post"
    	class="form-horizontal form-groups-bordered">
		@csrf

        <div class="form-group">

            <div class="col-sm-offset-4 col-sm-4">
                <select name="content_id" class="form-control" required>
                    <option value="">Select a scientific article</option>
                    <?php
                    $articles = Content::where('type', 'article')->get();

                    foreach($articles as $article) {
                    	$linked = $article->links()->where('keyword_id', $keyword_id)->get();
                    	if($linked->isEmpty()) {
                    		$details = ['author' => '', 'url' => '', 'disease_1' => '', 'disease_2' => '',
			      				'abstract' => '', 'concept' => ''];

                    		foreach($article->details()->get() as $detail)
								$details[$detail->key] = $detail->value;
							?>
	                    	<option value="<?php echo $article->id; ?>">
	                    		{{ $article->title }}
	                    	</option>
                    	<?php }
            	 	} ?>
                </select>
            </div>

            <input type="hidden" name="keyword_id" value="{{ $keyword_id }}">
            <input type="hidden" name="content_type" value="article">

            <div class="col-sm-2">
                <button type="submit" class="btn btn-success" style="width: 100%;">Link Scientific Article</button>
            </div>
        </div>
    </form>

	@include('admin.links_quran')
	@include('admin.links_hadith')
	@include('admin.links_manuscript')
	@include('admin.links_article')

@endsection