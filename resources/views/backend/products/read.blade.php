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
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('product.create')}}" class="btn btn-sm btn-success">Create New Product</a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Products</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Brand</th>
                        <th>Product Code</th>
                        <th>Name</th>
                        <th>Tag Price</th>
                        <th>Sale Price</th>
                        <th>Has Offer</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->subcategory->category->category_name}}</td>
                            <td>{{$product->subcategory->subcategory_name}}</td>
                            <td>{{$product->brand->brand_name}}</td>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->tag_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td><a class="btn btn-sm {{($product->has_offer == 1)?'btn-success':'btn-danger'}}" href="{{route("product.offer.update",['id'=>$product->id])}}">{{($product->has_offer == 1)?'Yes':'No'}}</a></td>
                            <td><a class="btn btn-sm {{($product->featured == 1)?'btn-success':'btn-danger'}}" href="{{route("product.feature.update",['id'=>$product->id])}}">{{($product->featured == 1)?'Yes':'No'}}</a></td>
                            <td><a class="btn btn-sm {{($product->product_status == 1)?'btn-success':'btn-danger'}}" href="{{route("product.status.update",['id'=>$product->id])}}">{{($product->product_status == 1)?'Active':'Inactive'}}</a></td>
                            <td>
                                <a href="{{route('product.show',['id'=>$product->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-eye"></i> View</a>
                                <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('product.destroy',['id'=>$product->id])}}" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Brand</th>
                        <th>Product Code</th>
                        <th>Name</th>
                        <th>Tag Price</th>
                        <th>Sale Price</th>
                        <th>Has Offer</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
