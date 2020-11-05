@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">All User</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('user.create')}}" class="btn btn-sm btn-success">Register New User</a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Users</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            @if($user->f_name != null)
                                <td><span>{{$user->f_name}}</span> {{$user->l_name}}</td>
                            @else
                                <td><span>{{$user->name}}</span></td>
                            @endif
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->role->role_name}}</td>
                            <td>
                                <a href="{{route('user.show',['id'=>$user->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-eye"></i> View</a>
                                <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
