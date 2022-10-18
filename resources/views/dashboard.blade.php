@extends('layouts.slidebaar')
@section('title') {{'Dashboard'}} @endsection
@section('page-name')

<h4>Dashboard</h4>
<h4 class="fa-solid fa-user text-right ">Welcome {{ Session::get('name') }}</h4>

@endsection

@section('main-section')
<div class="container text-center">
<h1>Welcome to Apna School </h1>
</div>
@endsection
