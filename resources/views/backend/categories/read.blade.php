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
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('category.create')}}" class="btn btn-sm btn-success">Create New Category</a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Categories</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{$category->category_image}}" alt="" height="80px"></td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
