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
                        <li class="breadcrumb-item active"><a href="{{route('brand.index')}}">Brands</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('brand.index')}}" class="btn btn-sm btn-dark">Brands</a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Edit Barand</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('brand.update',['id'=>$brand->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="brand_image" class="col-md-4 col-form-label text-md-right">Brand Image</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-dark text-white"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                        <input id="thumbnail" class="form-control @error('brand_image') is-invalid @enderror" type="text" name="brand_image" placeholder="300 X 80">
                                    </div>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                @error('brand_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">Brand Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="brand_name"
                                       value="{{ $brand->brand_name }}" autocomplete="title" autofocus>

                                @error('brand_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Update Brand
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection