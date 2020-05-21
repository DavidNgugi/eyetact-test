@extends('layouts.main')

@section('header', 'Add New Users')

@section('content')
    <div class="row justify-content-center">
        <div class = "col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @can('add users')
                @include('partials.errors')
                <form action="/users" class = "form" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name = "name" autofocus autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" name = "email" autocomplete="on" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Choose role</label>
                        <select name="role" required>
                            <option value="user">User</option>
                            @can('add admin')
                                <option value="admin">Admin</option>
                            @endcan
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            @endcan
        </div>
    </div>

@endsection