@extends('layouts.main')

@section('header', 'Product')

@section('content')
   @include('partials.add-product')
    <product-table></product-table>
@endsection
