@extends('layouts.main')

@section('header', 'All Products')

@section('content')
     <div class="row" style = "margin-bottom: 5px;">
        <a href ="{{ url('products/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a>
    </div>

    <div class="row form-group">
        @if(!$products->isEmpty())
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="/users/{{$product->id}}/show"><i class ="fa fa-eye"></i></a></td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{substr($product->description, '20')}}...</td>
                        <td>
                            <a href="/products/{{$product->id}}/edit"><i class ="fa fa-pencil"></i></a> 
                            <a href="/products/{{$product->id}}"><i class ="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            {{ $products->links() }}
        </div>

        @else
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 justify-content-center">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sorry!</strong> No products found
                </div>
            </div>
        @endif
        
    </div>
@endsection