<?php
$keywords = ['dates', 'khurma'];
$advertisement = App\Advertisement::all();
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"
     xmlns:og="http://ogp.me/ns#"

xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8" />
    <title>Naqli Aqli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link href="{{asset('public/frontend/css/style1.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/ta.css')}}">
  <script>
      //document.addEventListener('contextmenu', event => event.preventDefault());
  </script>
</head> 
<body>

<nav class="navbar">
    <button type="button" style="background-color:#ccc;"  data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span style="background-color:#fff;" class="icon-bar"></span>
                <span style="background-color:#fff;" class="icon-bar"></span>
                <span style="background-color:#fff;" class="icon-bar"></span>
            </button>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/company-registration') }}">Company Registration</a></li>
            <li><a href="{{ url('/refund-policy') }}">Refund / Cancellation Policy</a></li>
            <li><a href="{{ url('/about-us') }}">About Us</a></li>
            <li><a href="{{ url('/permission') }}">Permission</a></li>
<!--            <li><a href="--><?php //echo Request::$BASE_URL; ?><!--index.php/guide">Guide</a></li>-->
            <li><a href="{{ url('/team') }}">Our Team</a></li>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <?php if(Auth::user() && Auth::user()->role == 'subscriber'){ ?>
                <li><a href="{{ url('/subscription') }}">Subscription</a></li>
                <li><a href="{{ url('/user-logout') }}">Logout</a></li>
            <?php }else{ ?>
                <li><a href="{{ url('/user-register') }}">Register/Sign In</a></li>
            <?php } ?>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li> -->
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

@if(session()->has('success'))
    <div class="alert alert-success" role="success" style="margin: 0px 15px;">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 top10 col-md-offset-3">

            <img  src="{{ asset('public/frontend/images/logo.png') }}" width="100%" />

        </div>
        <!-- Col Md 8 -->
    </div>
    <!-- Row -->



    <div class="row">
        <form action="{{ url('/search') }}" method="POST">
            @csrf
        <div class="col-md-6 col-md-offset-1">
            <input type="text" class="form-control typeahead" style="width:100%" placeholder="Search for Prophetic Food or Disease" name="search" required="" />
        </div>
        <!-- Col Md 6 -->

        <div class="col-md-2">
            <input type="submit" value="Search" class="btn btn-block btn-danger" style="background-color:#b08609; border-color:#916f10;" />
        </div>
        <!-- Col Md 2 -->
        </form>

        <div class="col-md-2">
            <button type="button" onClick="return showCanvas()" class="btn btn-block btn-primary" style="background-color:#3b8087; border-color:#286a70;">Get Started</button>
        </div>
    </div>
    <!-- Row -->

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="myCanvasContainer">
             <canvas width="600" height="400" id="myCanvas">
              <p>Anything in here will be replaced on browsers that support the canvas element</p>
              <ul>
               <?php if(isset($keywords) && count($keywords)>0){ foreach($keywords as $keyword){ ?>
                              
                <li><a href="#"><?php echo $keyword; ?></a></li>
               <?php }} ?>
              </ul>
             </canvas>
            </div>

        </div>
    </div>




    <br><br>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div id="myCarousel" class=" col-md-7 carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php if(isset($advertisement)){
                        foreach ($advertisement as $ad){ ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $ad->position  ?>" class="active"></li>
                        <?php    }
                    } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php
                    $first = true;
                    ?>
                    <?php if(isset($advertisement)){
                        foreach ($advertisement as $ad){ ?>
                            <div class="item <?php echo ($first == true ? "active" : "") ?>">
                                <?php
                                $first = false;
                                if (isset($ad->link)&& !empty($ad->link)){ ?>
                                <a href="<?php echo $ad->link;?>" > <img  src="<?php echo $ad->path;?>" alt="Naisse.org"></a>
   
                               <?php }else{ ?>
                                 <!-- <img  src="<?php echo $ad->path;?>" alt="Naisse.org"> -->
                                 <img  src="{{ asset('public/uploads/' . $ad->image) }}" alt="Naisse.org">  
                              <?php } ?>
                            </div>

                        <?php    }
                    } ?>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    
    
    
    <br><br><br>






</div>
<!-- container fluid ends -->



<nav class="navbar navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<script type="text/javascript">
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var keywords = [
        <?php if(isset($keywords) && count($keywords)>0){ $c=count($keywords); $i=0; foreach($keywords as $k){ $i++; ?>
        <?php echo '"'.$k.'"'; ?>
        <?php if($i<$c){echo ",";} ?>
        <?php }} ?>
    ];

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 0
        },
        {
            name: 'keywords',
            source: substringMatcher(keywords)
        });
</script>
<!-- new -->

<script type="text/javascript" src="{{ asset('public/frontend/js/tagcanvas.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {   if( ! $('#myCanvas').tagcanvas({     textColour : '#000000',     outlineThickness : 1,     maxSpeed : 0.03,     depth : 0.75   })) {     // TagCanvas failed to load
        $('#myCanvasContainer').hide();   }
        // your other jQuery stuff here...
        $('#myCanvasContainer').hide();
    });
    function showCanvas(){   $('#myCanvasContainer').show('slow');   }

    $('#btn-pack').on('click',function(e){
        e.preventDefault();
        $('#myModalx').modal('show');
    });
</script></body></html>