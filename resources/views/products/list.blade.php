@extends('layouts.main')

@section('header', 'All Products')

@section('content')

<div class="container">
    @include('partials.add-product')
    <br>
    <product-table></product-table>
</div>

@endsection
