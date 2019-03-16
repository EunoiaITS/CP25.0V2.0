<nav class="navbar navbar-default">
    <button type="button" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form action="{{ url('/search') }}" method="POST">
            @csrf
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a style="display:inline;padding:0px;" href="{{ url('/') }}">
                        <img src="{{ asset('public/frontend/images/logo.png') }}" height="50px" />
                    </a>
                </li>
                <li class="nav-search">
                    <input type="text" class="form-control" placeholder="Search"  value="<?php if(isset($search)) echo $search; ?>" name="search" />
                </li>
                <li class="nav-search">
                    <input type="submit" value="Search" style="background-color:#b08609; border-color:#916f10;" class="btn btn-block btn-danger" />

                </li>
            </ul>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/about-us') }}">About Us</a></li>
            <li><a href="{{ url('/permission') }}">Permission</a></li>
<!--            <li><a href="--><?php //echo Request::$BASE_URL; ?><!--index.php/guide">Guide</a></li>-->
            <li><a href="#">Forum</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            <li><a href="{{ url('/team') }}">Our Team</a></li>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
            <?php if(Auth::user() && Auth::user()->role == 'subscriber'){ ?>
                <li><a href="{{ url('/subscription') }}">Subscription</a></li>
                <li><a href="{{ url('/user-logout') }}">Logout</a></li>
            <?php }else{ ?>
                <li><a href="{{ url('/user-register') }}">Register/Sign In</a></li>
            <?php } ?>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>