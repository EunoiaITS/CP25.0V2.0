@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscriber Dashboard</div>

                <div class="card-body">
                    @if (session('success-message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success-message') }}
                        </div>
                    @endif

                    Welcome to your dashboard, {{ Auth::user()->name }} !!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
