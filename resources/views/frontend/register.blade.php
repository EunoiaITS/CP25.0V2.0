@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Register / Login<small></small></h1>
            </div>
        </div>
    </div>

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Register / Login</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h3>Login</h3>

            @if(session()->has('error-message'))
              	<div class="alert alert-danger" role="alert">
              		{{ session()->get('error-message') }}
              	</div>
          	@endif

            <form action="{{ url('/user-login') }}" method="POST">
            	@csrf
                <input type="email" class="form-control" placeholder="Email" required name="email" value="{{ old('email') }}">
                <br />
                <input type="password" class="form-control" placeholder="Password" required name="password">
                <br />
                <input type="hidden" class="form-control" name="role" value="subscriber">
                <input type="submit" name="submit" value="Login" class="btn btn-block btn-success" />
            </form>
        </div>
        <!-- left side of search ends -->

        <div class="col-md-6">
            <h3>Register</h3>

            @if(session()->has('success'))
              	<div class="alert alert-success" role="success">
              		{{ session()->get('success') }}
              	</div>
          	@endif

          	@if(count($errors) > 0)
                <div class="row" style="margin: 15px 0px;">
                    <ul class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <li style="margin-left: 15px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/user-register') }}" method="POST">
            	@csrf
            	<input type="text" class="form-control" placeholder="Name" required name="name" value="{{ old('name') }}">
                <br />
                <input type="email" class="form-control" placeholder="Email" required name="email" value="{{ old('email') }}">
                <br />
                <input type="password" class="form-control" placeholder="Password" required name="password">
                <br />
                <input type="password" class="form-control" placeholder="Retype Password" required name="password_confirmation">
                <br />
                <input type="hidden" class="form-control" name="role" value="subscriber">
                <input type="submit" name="submit" value="Register" class="btn btn-block btn-primary" />
            </form><br>
        </div>

    </div>
    <!-- right side of search ends -->
</div>
<!-- main row ends -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Refund and Cancellation Policy</h2>



            <p>

                <br />
                You may cancel a free trial anytime during the free trial period and incur no charge. For all initial purchases of subscriptions longer than one month, you may cancel during the first 10 days (calculated from the date of purchase plus the free trial period, if applicable) and receive a full refund. If the cancellation occurs after the first 10 days, you won’t be eligible for a refund. If you cancel your subscription but are not eligible for a refund, you’ll retain access to the subscription until it expires.
                <br /><br />
                For renewals of subscriptions longer than one month, cancel within seven days of the renewal date to receive a full refund. No refund is available for monthly subscriptions.
                <br /><br />
                To cancel your subscription, please complete the required fields in this form and include the following information in the description field:
                <br /><br />
                Username<br />
                Email address used when subscribing
                <br /><br />
                For more information, contact us at naisse.hall@gmail.com
            </p>
        </div>
    </div>
</div>

@endsection