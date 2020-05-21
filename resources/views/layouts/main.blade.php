@extends('layouts.app')

@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.sidebar')
        </div>
        <div class="col-md-10">
            @include('partials.flash-message')
            <div class="card">
                <div class="card-header">@yield('header')</div>
                <div class="card-body">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
