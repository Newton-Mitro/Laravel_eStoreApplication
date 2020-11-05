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
                        <li class="breadcrumb-item active"><a href="{{route('product.index')}}">Products</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('product.index')}}" class="btn btn-sm btn-dark">Products</a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">New Product</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-right">Brand</label>

                            <div class="col-md-6">
                                <select class="form-control" name="brand_id" id="">
                                    @foreach($brands as $brand)
                                        <option name="brand_id" value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>

                                @error('brand_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="form-control  @error('name') is-invalid @enderror" name="category_id" id="category_id">
                                    <option >Select Category</option>
                                @foreach($categories as $category)
                                        <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">Sub-Category</label>

                            <div class="col-md-6">
                                <select class="form-control  @error('name') is-invalid @enderror" name="subcategory_id" id="subcategory_id">
                                    {{--@foreach($subcategories as $subcategory)--}}
                                        {{--<option name="subcategory_id" value="{{$subcategory->id}}">{{$subcategory->name}}</option>--}}
                                    {{--@endforeach--}}
                                </select>

                                @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">Product Image</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-dark text-white"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                        <input id="thumbnail" class="form-control @error('product_image') is-invalid @enderror" type="text" name="product_image"
                                               placeholder="300 X 250">
                                    </div>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                            @error('product_image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">Product Code</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text"
                                       class="form-control @error('product_code') is-invalid @enderror" name="product_code"
                                       value="{{ old('product_code') }}" autocomplete="product_code" autofocus>

                                @error('product_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text"
                                       class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                       value="{{ old('product_name') }}" autocomplete="product_name" autofocus>

                                @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="product_long_description" class="col-md-4 col-form-label text-md-right">Long Description</label>

                            <div class="col-md-6">
                                <textarea id="product_long_description" type="text"
                                       class="form-control @error('product_long_description') is-invalid @enderror"
                                       name="product_long_description" rows="5" cols="1"
                                          autocomplete="product_long_description" autofocus>{{ old('product_long_description') }} </textarea>

                                @error('product_long_description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag_price" class="col-md-4 col-form-label text-md-right">Tag Price</label>

                            <div class="col-md-6">
                                <input id="tag_price" type="number"
                                       class="form-control @error('tag_price') is-invalid @enderror"
                                       name="tag_price" step="any"
                                       value="{{ old('tag_price') }}" autocomplete="tag_price" autofocus>

                                @error('tag_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sale_price" class="col-md-4 col-form-label text-md-right">Sale Price</label>

                            <div class="col-md-6">
                                <input id="sale_price" type="number"
                                       class="form-control @error('sale_price') is-invalid @enderror"
                                       name="sale_price" step="any"
                                       value="{{ old('sale_price') }}" autocomplete="sale_price" autofocus>

                                @error('sale_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="has_offer" class="col-md-4 col-form-label text-md-right">Has Offer</label>

                            <div class="col-md-6">
                                <select class="form-control" name="has_offer" id="">
                                        <option name="has_offer" value="0">No</option>
                                        <option name="has_offer" value="1">Yes</option>
                                </select>

                                @error('has_offer')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="featured" class="col-md-4 col-form-label text-md-right">Featured</label>

                            <div class="col-md-6">
                                <select class="form-control" name="featured" id="">
                                    <option name="featured" value="0">No</option>
                                    <option name="featured" value="1">Yes</option>
                                </select>

                                @error('featured')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status" id="">
                                    <option name="product_status" value="0">In-active</option>
                                    <option name="product_status" value="1">Active</option>
                                </select>

                                @error('product_status')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: '/sbucategories/' + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + key + '">' + value + '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
@endsection
