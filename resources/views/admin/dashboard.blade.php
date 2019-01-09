@extends('layouts.master')

@section('content')
        
    Welcome to your dashboard, {{ Auth::user()->name }} !!!

@endsection