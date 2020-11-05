@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">{{$user->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-success">Edit User</a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <strong><i class="fas fa-camera"></i> Photo</strong>
                    <p class="text-muted">
                        @if($user->image!=null)
                            <img src="{{$user->image}}" alt="" width="200px" class="img-thumbnail">
                        @else
                            <img src="{{ asset('dist/img/avatar04.png')}}" alt="" width="200px" class="img-thumbnail">
                        @endif
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Display Name</strong>
                    <p class="text-muted">
                        {{$user->name}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-envelope-open"></i> Email</strong>
                    <p class="text-muted">{{$user->email}}</p>
                    <hr>

                    <strong><i class="fas fa-phone-square"></i> Phone</strong>
                    <p class="text-muted">
                        {{$user->phone}}
                    </p>
                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Role</strong>
                    <p class="text-muted">{{$user->role->role_name}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
