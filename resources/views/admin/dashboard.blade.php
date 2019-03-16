@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Queries!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\Keyword::all()) }}</div>
                            <div>Keywords!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/keywords') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\User::all()) }}</div>
                            <div>Users!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/users') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\Content::where('type', 'food')->get()) }}</div>
                            <div>Prophetic Foods!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/foods') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Latest User Queries</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="panel panel-primary">
		<!-- <div class="panel-heading">
    		<h3 class="panel-title">Users List</h3>
  		</div> -->
		<div class="panel-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">
			    	<thead>
			      		<tr>
			        		<th>#</th>
			        		<th>Query</th>
			        		<th>IP Address</th>
			        		<th>User</th>
			      		</tr>
			    	</thead>
			    	<tbody>
			    		
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>

@endsection