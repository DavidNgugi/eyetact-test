@extends('layouts.main')

@section('header', 'All Users')

@section('content')
    <div class="row" style = "margin-bottom: 5px;">
        @can('add users')
            <a href ="{{ url('users/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>
        @endcan
    </div>

    <div class="row form-group">
        @if(!$users->isEmpty())
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        @if(!$user->hasRole('super-admin'))
                            @if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                                <a href="/users/{{$user->id}}/edit"><i class ="fa fa-pencil"></i></a> 
                                <a href="/users/{{$user->id}}"><i class ="fa fa-trash-o"></i></a>
                            @else
                                <span class="label label-info">Admin only</span>
                            @endif
                        @else
                            <span class="label label-info">Super Admin only</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @else
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sorry!</strong> No users found
                </div>
            </div>
        @endif
        
    </div>
    
@endsection