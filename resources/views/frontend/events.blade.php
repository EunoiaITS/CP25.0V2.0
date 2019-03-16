<?php
$events = App\Event::all();
?>

@extends('frontend.master')

@section('content')

	<div class="container">
      	<h3>Events</h3>
      	<div class=" row">
          <?php
          foreach($events as $q): ?>
          <!-- <div <?php if(!$q->is_approved){ ?>class="danger"<?php } ?> data-id="<?php echo $q->id; ?>"></div> -->



          <div class="col-xs-12 col-sm-6 col-md-4"  style="border:1px solid #e5e4e4;margin: 10px 0px 2px 0px;padding: 15px;height: 200px;">
              <div class="home-5-p-c-content">
                  <div class="home-5-p-c-details">

                      <h2><a href="{{ url('/events/' . $q->id) }}">
                              <?php echo substr($q->title, 0, 30); ?></a><span><i class="fa fa-female"></i></span></h2>
                      <p>
                          <?php

                          $max_length = 190;

                          if (strlen($q->description) > $max_length)
                          {
                              $offset = ($max_length - 3) - strlen($q->description);
                              $s = substr($q->description, 0, strrpos($q->description, ' ', $offset)) . '...';
                              echo $s;
                          }else{
                              echo $q->description;
                          }


                          ?>

                      </p>
                  </div>
              </div>
          </div>

          <?php endforeach; ?>
      	</div>
	</div>

@endsection