@extends('layouts.main')

@section('header', 'Edit User Details')

@section('content')
    <div class="row justify-content-center">
        @can('edit users')
            <div class = "col-xs-12 col-sm-12 col-md-4 col-lg-4">
            
                <form action="/users/{{$user->id}}/edit" class = "form" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name = "name" value = "{{ $user->name }}" autofocus autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" name = "email" value = "{{ $user->email }}" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Choose role</label>
                        <select name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        @else
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Hey!</strong> You lack the neccessary permissions to view this page
                </div>
            </div>
        @endcan
    </div>

@endsection