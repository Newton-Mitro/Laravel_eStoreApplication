@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    @php
        $settings = \App\Admin\Models\Setting::find(1);
        $grand_total = 0;
    @endphp
    <div class="pt-5">
        <center class="ml-5 mr-5 mb-5">
            <div class="" style="margin-top:10px;">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <img class="img-fluid pr-2" src="{{ asset('dist/img/logo1.png') }}" height="90 px" width="90 px"
                             alt="logo"
                             style="float: left; margin: 5px"/>
                        <div class="pl-2">
                            <h5><b>{{($settings->site_title!=null)?$settings->site_title:'Site Title'}}</b></h5>
                            @if($settings->address_line_1!=null)
                                {{$settings->address_line_1}}<br>
                                {{$settings->address_line_2}}<br>
                                {{$settings->address_line_3}}
                            @endif
                            @if($settings->phone1!=null)
                                {{$settings->phone1}}, {{$settings->phone2}}

                            @endif
                            <h6>From <?php echo date('F d, Y', strtotime(date($start_date))); ?> To
                                <?php echo date('F d, Y', strtotime(date($end_date))); ?>
                            </h6>
                            <p style="float:right; margin-right:20px;"><?php echo date('F d, Y', strtotime(date("Y-m-d"))); ?></p>
                        </div>
                    </div>
                    <div class="row p-5 no-print position-absolute" style="top: 70px;right: 0px">
                        <button id="print" class="btn btn-app float-right"><i class="fas fa-print"></i>Print</button>
                    </div>
                </div>
            </div>
            <!-- Order Placed Table-->
            <table class="table table-striped table-bordered table-light table-hover" id="tab2"
                   style="width:100%; margin-top:20px;">
                <thead class="thead-light">
                <tr>
                    <?php $grand_total = 0; ?>
                    <th colspan="6" class="text-center"><h4>
                            @if ($order_status_id==0)
                                <b>All Orders</b>
                            @elseif($order_status_id==1)
                                <b>New/Received Orders</b>
                            @elseif($order_status_id==2)
                                <b>Processing Orders</b>
                            @elseif($order_status_id==3)
                                <b>Sale/Confirmed Order</b>
                            @else
                                <b>Order Canceled</b>
                            @endif
                        </h4></th>
                </tr>
                </thead>

                @foreach($order_data as $order)
                    {{--@php--}}
                    {{--dd($r);--}}
                    {{--@endphp--}}
                    <thead class="thead-light" style="margin-bottom:20px;">
                    <tr>
                        <th class="small"><b>Order ID</b></th>
                        <th class="small" colspan="5"><b>{{ $order->id }}</b></th>
                    </tr>
                    <tr>
                        <th class="small"><b>SL.</b></th>
                        <th class="small"><b>Product Name</b></th>
                        <th class="small"><b>Product Code</b></th>
                        <th class="small text-right"><b>Price</b></th>
                        <th class="small text-center"><b>Quantity</b></th>
                        <th class="small text-right"><b>Total</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $details = App\Models\OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
                          ->join('products', 'products.id', '=', 'order_details.product_id')
                          ->select('order_details.*','order_details.*')
                          ->where('orders.id', '=', $order->id)
                          ->get();

                    @endphp
                    @foreach($details as $key=>$item)
                        <tr class='small'>
                            <td><b>{{$key+1}}</b></td>
                            <td><b>{{$item->product_name}}</b></td>
                            <td><b>{{$item->product_code}}</b></td>
                            <td class="text-right"><b>{{asTaka($item->sale_price)}}</b></td>
                            <td class="text-center"><b>{{$item->quantity}}</b></td>
                            <td class="text-right"><b>{{asTaka($item->amount)}}</b></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5"><b>Sub-total</b></td>
                        <td class="text-right"><b>{{asTaka($details->sum('amount'))}}</b></td>
                        @php
                            $grand_total = $grand_total + $details->sum('amount');
                        @endphp
                    </tr>
                    </tbody>
                @endforeach
                <tr>
                    <td colspan="5"><b>Grand Total</b></td>
                    <td class="text-right"><b>{{asTaka($grand_total)}}</b></td>
                </tr>
                <tr>
                    <td colspan=""><strong>In Words:</strong></td>
                    <td colspan="5" class="text-center"><strong>{{convertNumberToWord($grand_total)}} taka
                            only.</strong></td>
                </tr>
            </table>
            <!--End of Order Place Table -->
            <hr style="width:200px; height:5px; background-color:#000000; margin-top:150px; margin-left:auto; margin-right:0; text-align:right;">

            <h6 class="pb-5" style="text-align:right;">Authorized Signature</h6>

        </center>

    </div>
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
