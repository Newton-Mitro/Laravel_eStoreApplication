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
                        <li class="breadcrumb-item active">Sub-Categories</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('subcategory.create')}}" class="btn btn-sm btn-success">Create New Sub-Category</a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Sub-Categories</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategories as $key=>$subcategory)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{$subcategory->subcategory_image}}" alt="" height="80px"></td>
                            <td>{{$subcategory->category->category_name}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>
                                <a href="{{route('sub_category.edit',['id'=>$subcategory->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('sub_category.destroy',['id'=>$subcategory->id])}}" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
