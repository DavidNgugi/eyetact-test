@extends('layouts.main')

@section('header', 'Create New Material')

@section('content')
    <div class="row justify-content-center">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('partials.errors')
            <form action="/products" class = "form" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class = "col-md-6">
                        {{-- <div class = "row"> --}}
                            <div class="col-md-12">
                                <div class = "row form-group">
                                    <input type="checkbox" class="form-control col-md-1" id="carrier" name = "carrier">
                                    <span style = "margin-top: 8px;">Carrier</span>
                                </div>
                            </div>
                            <div class = "row ">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name = "name" placeholder="Name" autofocus autocomplete="on" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="material_id">Material ID</label>
                                    <input type="text" class="form-control" id="material_id" name = "material_id" placeholder="Material ID" autocomplete="on" required>
                                </div>
                            </div>
                        
                        <div class="form-group">
                            <label for="ingredients">Properties</label>
                            <div class ="row col-md-12">
                                <select class= "form-control col-md-8" name="ingredient" style ="margin-right:10px;" required>
                                    <option value="ingredient 1">Ingredient 1</option>
                                    <option value="ingredient 2">Ingredient 2</option>
                                </select>
                                <input type="number" class="form-control col-md-2" id="value" name = "value" placeholder="Value" autocomplete="on" required>
                                <i class ="fa fa-trash-o col-md-1" style = "padding-top: 10px;"></i></button>
                            </div>
                            <div class = "row pull-right">
                                <button type ="button" class = "btn btn-primary btn-rounded" style = "margin-top: 10px; border-radius: 50%;"><i class ="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div> 
                    {{-- End left section --}}

                    <div class = "col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name = "description" placeholder="Description" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" name = "attachments[]" placeholder="UPLOAD FILES" required>
                        </div>
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="row pull-right">
                        <a href = "{{ url('/products')}}" class="btn btn-primary" style = "margin-right: 5px;">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection