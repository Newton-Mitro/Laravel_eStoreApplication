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
                            <li class="breadcrumb-item active">Service Zones</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <a href="{{route('service.create')}}" class="btn btn-sm btn-success">Create New Service Zone</a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Service Zones</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Store Name</th>
                            <th>Zone Name</th>
                            <th>Shipping Cost</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servicezones as $key=>$zone)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$zone->store->store_name}}</td>
                                <td>{{$zone->zone_name}}</td>
                                <td>{{$zone->shipping_cost}}</td>
                                <td>
                                    <a href="{{route('service.edit',['id'=>$zone->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-pen-square"></i> Edit</a>
                                    <a href="{{route('service.destroy',['id'=>$zone->id])}}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Store name</th>
                            <th>Zone Name</th>
                            <th>Shipping Cost</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
