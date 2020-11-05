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
                            <li class="breadcrumb-item active"><a href="{{route('shippingdiscount.index')}}">Shipping
                                    Discount</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('shippingdiscount.index')}}" class="btn btn-sm btn-dark">Shipping Discounts</a>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Edit Shipping Discount</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('shippingdiscount.update',['id'=>$shippingdiscount->id]) }}">
                            @csrf


                            <div class="form-group row">
                                <label for="cart_total" class="col-md-4 col-form-label text-md-right">Cart Total</label>

                                <div class="col-md-6">
                                    <input id="cart_total" type="number"
                                           class="form-control @error('cart_total') is-invalid @enderror"
                                           name="cart_total"
                                           value="{{ $shippingdiscount->cart_total }}" autocomplete="cart_total" autofocus step="any">

                                    @error('cart_total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount_amount" class="col-md-4 col-form-label text-md-right">Discount Amount</label>

                                <div class="col-md-6">
                                    <input id="discount_amount" type="number"
                                           class="form-control @error('discount_amount') is-invalid @enderror" name="discount_amount"
                                           value="{{ $shippingdiscount->discount_amount }}" autocomplete="discount_amount" autofocus step="any">

                                    @error('discount_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Update Shipping Discount
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
