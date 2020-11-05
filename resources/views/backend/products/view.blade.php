@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row p-5">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="{{$product->product_image}}" width="100%" /></div>
                            </div>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{$product->product_name}}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <h6 class="price">Product Code: <span>{{$product->product_code}}</span></h6>
                            <h6 class="price">Tag Price: <span>{{$product->tag_price}}</span></h6>
                            <h6 class="price">Sale Price: <span>{{$product->sale_price}}</span></h6>
                            <p class="product-description">{{$product->product_long_description}}</p>
                            <h6 class="price">Has Offer: <span>{{($product->has_offer==1)?'Yes':'No'}}</span></h6>
                            <h6 class="price">Featured: <span>{{($product->featured==1)?'Yes':'No'}}</span></h6>
                            <h6 class="price">Status: <span>{{($product->product_status==1)?'Active':'Inactive'}}</span></h6>
                            <h6 class="price">Category: <span>{{$product->subcategory->category->category_name}}</span></h6>
                            <h6 class="price">Sub-Category: <span>{{$product->subcategory->subcategory_name}}</span></h6>
                            <h6 class="price">Brand: <span>{{$product->brand->brand_name}}</span></h6>


                            <div class="action">
                                <a href="{{route('product.edit',['id'=>$product->id])}}" class="add-to-cart btn btn-default" type="button">Edit</a>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
