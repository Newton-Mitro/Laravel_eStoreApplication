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
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                @if($status == 0)
                    <h3 class="card-title text-bold">All Orders</h3>
                @elseif($status == 1)
                    <h3 class="card-title text-bold">New Orders</h3>
                @elseif($status == 2)
                    <h3 class="card-title text-bold">Processing Orders</h3>
                @elseif($status == 3)
                    <h3 class="card-title text-bold">Delivered Orders</h3>
                @elseif($status == 4)
                    <h3 class="card-title text-bold">Canceled Orders</h3>
                @endif

            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Service Zone</th>
                        <th>Shipping To</th>
                        <th>Shipping Address</th>
                        <th>Shipping Phone</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{date('d M Y h:i a ', strtotime($order->created_at))}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->service_zone->zone_name}}</td>
                            <td>{{$order->shipping_detail->shipping_f_name ." ".  $order->shipping_detail->shipping_l_name}}</td>
                            <td>{{$order->shipping_detail->shipping_address}}</td>
                            <td>{{$order->shipping_detail->shipping_phone}}</td>
                            <td>{{$order->status->status_name}}</td>
                            <td>
                                <a href="{{route('order.show',['id'=>$order->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-eye"></i> View Details</a>
                                <a href="{{route('order.destroy',['id'=>$order->id])}}" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Service Zone</th>
                        <th>Shipping To</th>
                        <th>Shipping Address</th>
                        <th>Shipping Phone</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
