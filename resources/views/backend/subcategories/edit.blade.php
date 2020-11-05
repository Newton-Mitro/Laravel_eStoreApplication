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
                        <li class="breadcrumb-item active"><a href="{{route('sub_category.index')}}">Sub-Categories</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('sub_category.index')}}" class="btn btn-sm btn-dark">Sub-Categories</a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Edit Sub-Category</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('sub_category.update',$subcategory->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        @if($subcategory->category_id == $category->id)
                                            <option name="category_id" selected
                                                    value="{{$category->id}}">{{$category->category_name}}</option>
                                        @else
                                            <option name="category_id"
                                                    value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endif
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
                            <label for="subcategory_image" class="col-md-4 col-form-label text-md-right">Sub-Category Image</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-dark text-white"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                        <input id="thumbnail" class="form-control  @error('subcategory_image') is-invalid @enderror" type="text" name="subcategory_image"
                                               placeholder="300 X 80">
                                    </div>
                                </div>
                                @error('subcategory_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="subcategory_name" type="text"
                                       class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name"
                                       value="{{ $subcategory->subcategory_name }}" autocomplete="subcategory_name" autofocus>

                                @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Update Sub-Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection