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
                            <li class="breadcrumb-item active">Stores</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('store.create')}}" class="btn btn-sm btn-success">Create New Store</a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Stores</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Store Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $key=>$store)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$store->store_name}}</td>
                                <td>
                                    <a href="{{route('store.edit',['id'=>$store->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-pen-square"></i> Edit</a>
                                    <a href="{{route('store.destroy',['id'=>$store->id])}}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Store name</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
