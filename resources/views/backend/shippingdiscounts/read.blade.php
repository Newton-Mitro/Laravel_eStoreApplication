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
                            <li class="breadcrumb-item active">Shipping Discount
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('shippingdiscount.create')}}" class="btn btn-sm btn-success">Create New Shipping Discount</a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Shipping Discount</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Cart Total</th>
                            <th>Discount Amount</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shippingdiscounts as $key=>$shippingdiscount)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>If greater then ৳ {{$shippingdiscount->cart_total}}</td>
                                <td>{{$shippingdiscount->discount_amount}}%</td>
                                <td>
                                    <a href="{{route('shippingdiscount.edit',['id'=>$shippingdiscount->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-pen-square"></i> Edit</a>
                                    <a href="{{route('shippingdiscount.destroy',['id'=>$shippingdiscount->id])}}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Cart Total</th>
                            <th>Discount Amount</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
