@extends('layouts.master')

@section('content')

	<ol class="breadcrumb">
	  	<li><a href="{{ url('/admin') }}">Dashboard</a></li>
	  	<li><a href="{{ url('/admin/qurans') }}">Quran</a></li>
	  	<li class="active">Create Quran Ayat</li>
	</ol>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-primary" data-collapsed="0">
	            <div class="panel-heading">
	                <div class="panel-title" >
	                    <i class="fa fa-plus-circle"></i>
	                    Create New Quran Ayat
	                </div>
	            </div>
	            <div class="panel-body">

	            	<form action="{{ action('AdminQuransController@store') }}" method="post" class="form-horizontal form-groups-bordered">
	            		@csrf
		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Ayat (Arabic)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_arabic" rows="3" required></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Surah</label>

		                    <div class="col-sm-6">
		                        <select name="surah_id" class="form-control" required>
		                            <option value="">Select a surah</option>
		                            @foreach($page_data['surahs'] as $surah)
		                            	<option value="{{ $surah->id }}">
		                            		{{ $surah->id . ': ' . $surah->surah . ' - ' . $surah->trans_english }}
		                            	</option>
	                            	@endforeach
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Verse No.</label>

		                    <div class="col-sm-6">
	                            <input type="number" class="form-control" name="verse_no" value="">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Ayat (Malay)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_malay" rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="field-1" class="col-sm-3 control-label">Ayat (English)</label>

		                    <div class="col-sm-6">
	                            <textarea style="resize: vertical;" class="form-control" name="trans_eng" rows="3"></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-6">
		                        <button type="submit" class="btn btn-success">Submit</button>
		                    </div>
		                </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

@endsection