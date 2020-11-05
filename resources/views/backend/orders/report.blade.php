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
                        <li class="breadcrumb-item"><a href="{{route('order.index',1)}}">Orders</a></li>
                        <li class="breadcrumb-item active">Report</li>
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
                <h2>Report</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('report.result') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Order Status</label>

                        <div class="col-md-6">
                            <select class="form-control" name="status" id="">
                                <option name="status" value="0">All</option>
                                @foreach($statuses as $status)
                                    <option name="status" value="{{$status->id}}">{{$status->status_name}}</option>
                                @endforeach
                            </select>

                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">From Date:</label>
                        <div class="col-md-6">

                            <input type="date" class="form-control float-right" name="from_date" value="2020-06-09">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">To Date:</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control float-right" name="to_date" value="{{date('Y-m-d')}}">
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-sm btn-success">
                                View Report
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection