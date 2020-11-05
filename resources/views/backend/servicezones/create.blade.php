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
                            <li class="breadcrumb-item active"><a href="{{route('service.index')}}">Service Zone</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('service.index')}}" class="btn btn-sm btn-dark">Service Zones</a>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Create New Service Zones</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('service.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="store_id" class="col-md-4 col-form-label text-md-right">Store</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="store_id" id="store_id">
                                        @foreach($stores as $store)
                                            <option name="store_id" value="{{$store->id}}">{{$store->store_name}}</option>
                                        @endforeach
                                    </select>

                                    @error('store_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zone_name" class="col-md-4 col-form-label text-md-right">Zone Name</label>

                                <div class="col-md-6">
                                    <input id="zone_name" type="text"
                                           class="form-control @error('zone_name') is-invalid @enderror" name="zone_name"
                                           value="{{ old('zone_name') }}" autocomplete="zone_name" autofocus>

                                    @error('zone_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipping_cost" class="col-md-4 col-form-label text-md-right">Shipping Cost</label>

                                <div class="col-md-6">
                                    <input id="shipping_cost" type="number"
                                           class="form-control @error('shipping_cost') is-invalid @enderror" name="shipping_cost"
                                           value="{{ old('shipping_cost') }}" autocomplete="shipping_cost" autofocus step="any">

                                    @error('shipping_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Save Service Zone
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
