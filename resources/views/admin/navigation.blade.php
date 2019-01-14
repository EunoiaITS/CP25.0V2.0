<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Naisse</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/admin') }}" class="<?php if($page_name == 'dashboard') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Admin Dashboard
                    </a>
                    <a href="{{ url('/admin/users') }}" class="<?php if($page_name == 'users') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Manage Users
                    </a>
                    <a href="{{ url('/admin/qurans') }}" class="<?php if($page_name == 'qurans') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Quran
                    </a>
                    <a href="{{ url('/admin/hadiths') }}" class="<?php if($page_name == 'hadiths') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Hadith
                    </a>
                    <a href="{{ url('/admin/zikirs') }}" class="<?php if($page_name == 'zikirs') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Zikir
                    </a>
                    <a href="{{ url('/admin/articles') }}" class="<?php if($page_name == 'articles') echo 'active'; ?>">
                        <i class="fa fa-dashboard fa-fw"></i> 
                        Scientific Articles
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>