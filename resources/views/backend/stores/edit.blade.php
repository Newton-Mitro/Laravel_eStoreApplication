@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <div class="p-5">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('store.index')}}">Stores</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('store.index')}}" class="btn btn-sm btn-dark">Stores</a>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Edit Stores</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.update',$store->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Store Name</label>

                                <div class="col-md-6">
                                    <input id="store_name" type="text"
                                           class="form-control @error('store_name') is-invalid @enderror"
                                           name="store_name"
                                           value="{{ $store->store_name }}" autocomplete="store_name" autofocus>

                                    @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Update Store
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
