@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Choose Subscription<small></small></h1>
            </div>
        </div>
    </div>

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Subscription</li>
    </ol>
    <div class="row">
        <label class="col-md-offset-3 col-md-6">

            @if(session()->has('success'))
                <div class="alert alert-success" role="success">
                    {{ session()->get('success') }}
                </div>
            @endif

        <h5><?php echo 'Welcome, ' . Auth::user()->name; ?></h5>
        <form action="" method="POST">
            
            <div class="form-group">
                <label>Subscription :</label>
                <select name="subscription_package_id">
                    <option value="0">Select a package</option>
                    <optgroup label="Normal">
                        <option value="1">3 months [MYR 5]</option>
                    </optgroup>
                    <optgroup label="Normal">
                        <option value="2">12 months [MYR 10]</option>
                    </optgroup>
                    <optgroup label="Normal">
                        <option value="3">24 months [MYR 18]</option>
                    </optgroup>
                    <optgroup label="Platinum">
                        <option value="4">6 months [MYR 100]</option>
                    </optgroup>
                    <optgroup label="Platinum">
                        <option value="5">12 months [MYR 200]</option>
                    </optgroup>
                </select>
            </div>
            <a href="#" class="btn btn-block btn-primary">Make Payment</a>
            <!-- <input type="submit" name="submit" value="Make Payment" class="btn btn-block btn-primary" /> -->
        </form>
        <br>
    </div>
</div>

@stop