@extends('frontend.master')

@section('content')

<div class="container">
	<div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-info ">
                    <div class="row">
                    <div class="col-md-8">
                    <h3 class="panel-title"><?php echo $event_detail->title; ?>	</h3></div>
                        <div class="panel-title col-md-2"><h5><b>Date From: <?php echo date('d/m/Y', $event_detail->date_from); ?></b></h5></div>
                        <div class="col-md-2 panel-title"><h5><b>Date Till: <?php echo date('d/m/Y', $event_detail->date_till); ?></b></h5></div>

                </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="margin:2% 0% 3% 13%;">
                            <img  width="800" height="300" src="{{ asset('public/uploads/' . $event_detail->image) }}" alt="<?php echo $event_detail->title?>">
                            </div>
                            <td><?php echo $event_detail->description; ?></td>
                    </div>


                </div>
            </div>
        </div>

	</div>

</div>

@stop