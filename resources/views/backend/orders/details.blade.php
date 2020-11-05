@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    @php
        $settings = \App\Admin\Models\Setting::find(1);
    @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-3">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <div class="">
                            <div class="invoice-header position-relative">
                                <h1 class="m-0 text-dark text-bold">INVOICE</h1>
                                <img src="{{asset('dist/img/logo1.png')}}" class="position-absolute"
                                     style="top: 0;right: 0" id="invoice-logo" alt="" width="150px">
                            </div>
                            <div class="clearfix"></div>
                            <div class="bazar-address">
                                <p>
                                    <span
                                        class="text-bold">{{($settings->site_title!=null)?$settings->site_title:'Site Title'}}</span><br>
                                    @if($settings->address_line_1!=null)
                                        {{$settings->address_line_1}}<br>
                                    @endif
                                    @if($settings->address_line_2!=null)
                                        {{$settings->address_line_2}}<br>
                                    @endif
                                    @if($settings->address_line_3!=null)
                                        {{$settings->address_line_3}}<br>
                                    @endif
                                    @if($settings->phone1!=null or $settings->phone2!=null)
                                        Phone: {{$settings->phone1}}, {{$settings->phone2}}<br>
                                    @endif
                                    @if($settings->email!=null)
                                        Email: {{$settings->email}}
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        <span class="text-bold">Ship to and Bill to</span><br>
                                        {{$order->shipping_detail->shipping_f_name}} {{$order->shipping_detail->shipping_l_name}}
                                        <br>
                                        {{$order->shipping_detail->shipping_address}}<br>
                                        {{$order->shipping_detail->shipping_phone}}<br>
                                        {{$order->shipping_detail->shipping_email}}
                                    </p>
                                </div>
                                <div class="col-6 position-relative">
                                    <p class="bottom" style="position: absolute; bottom: 0px; right: 20px">
                                        <span class="text-bold">INVOICE ID:</span> <span>{{$order->id}}</span><br>
                                        <span class="text-bold">INVOICE DATE:</span>
                                        <span>{{$order->created_at->format('d M Y')}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach($orderDetails as $key=>$orderDetail)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$orderDetail->product_name}}</td>
                                            <td>{{$orderDetail->product_code}}</td>
                                            <td class="text-right">{{asTaka($orderDetail->sale_price)}}</td>
                                            <td class="text-center">{{$orderDetail->quantity}}</td>
                                            <td class="text-right">{{asTaka($orderDetail->amount)}} </td>
                                            @php
                                                $subtotal += ($orderDetail->sale_price*$orderDetail->quantity);
                                            @endphp
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">

                                <div class="border border-gray p-2">
                                    Terms & Conditions:
                                    <ol>
                                        <li>Payment Method: COD – Cash on Delivery</li>
                                        <li>Products to be checked and received by the customer while delivery</li>
                                        <li>Products received cannot be returned.</li>
                                    </ol>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td class="text-right">{{asTaka($subtotal)}} </td>
                                        </tr>

                                        <tr>
                                            <th>Shipping:</th>
                                            <td class="text-right">{{asTaka($shipping = $order->shipping_cost)}} </td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td class="text-right">{{asTaka($subtotal + $shipping)}} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>In Words:  </strong> {{convertNumberToWord($subtotal + $shipping)}} taka only.</td>
{{--                                            <td class="text-right"></td>--}}
                                        </tr>
                                    </table>
                                </div>
                                <button target="_blank" class="btn btn-default no-print float-right" id="print"><i
                                        class="fas fa-print"></i> Print
                                </button>
                            </div>
                            <div class="container row no-print">
                                <form action="{{route('order.update',$order->id)}}" method="post">
                                    @csrf
                                    <label for="status_id" class="d-block">Order Status</label>
                                    <select class="p-1 border-secondary" name="status_id" id="">
                                        @foreach($statuses as $status)
                                            @if($order->status_id == $status->id)
                                                <option selected name="status_id"
                                                        value="{{$status->id}}">{{$status->status_name}}</option>
                                            @else
                                                <option name="status_id"
                                                        value="{{$status->id}}">{{$status->status_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Update

                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    @php
        function convertNumberToWord($num = false)
            {
                $num = str_replace(array(',', ' '), '' , trim($num));
                if(! $num) {
                    return false;
                }
                $num = (int) $num;
                $words = array();
                $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
                    'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
                );
                $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
                $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
                    'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
                    'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
                );
                $num_length = strlen($num);
                $levels = (int) (($num_length + 2) / 3);
                $max_length = $levels * 3;
                $num = substr('00' . $num, -$max_length);
                $num_levels = str_split($num, 3);
                for ($i = 0; $i < count($num_levels); $i++) {
                    $levels--;
                    $hundreds = (int) ($num_levels[$i] / 100);
                    $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
                    $tens = (int) ($num_levels[$i] % 100);
                    $singles = '';
                    if ( $tens < 20 ) {
                        $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
                    } else {
                        $tens = (int)($tens / 10);
                        $tens = ' ' . $list2[$tens] . ' ';
                        $singles = (int) ($num_levels[$i] % 10);
                        $singles = ' ' . $list1[$singles] . ' ';
                    }
                    $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
                } //end for loop
                $commas = count($words);
                if ($commas > 1) {
                    $commas = $commas - 1;
                }
                return implode(' ', $words);
            }
            function asTaka($value) {
              return '৳ ' . number_format($value, 2);
            }
    @endphp
@endsection
