<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>

    </style>
</head>
<body>
    @php
setlocale(LC_MONETARY,"bn_BD");
@endphp
<div style="padding: 10px;">
    <table>
        <tr>
            <td style="vertical-align: bottom;padding: 10px 15px;">
                <img src="{{asset('dist/img/logo.png')}}" alt="" width="100px"
                     style="width: 100px"><br><strong style="font-size: 18px; padding-top: 10px; padding-bottom: 5px;">সমবায় বাজার</strong><br>
                <strong>Rev. Fr. Charles J. Young Bhaban</strong><br>
                173/1/A, East Tejturi Bazar,<br>
                Tejgaon, Dhaka-1215.<br>
                Phone: 58152640, 58153316, 9123764, 9139901-2
            </td>
            <td style="vertical-align: bottom;padding: 10px 15px;">
                <span><strong>Ship to and Bill to</strong></span><br>
                Name: {{$order->first_name}} <span> {{$order->last_name}}</span><br>
                Address: {{$order->delivery_address}}<br>
                @if($order->email!=null)
                    Email: {{$order->email}}<br>
                @endif
                Phone: {{$order->phone}}
            </td>
            <td style="text-align: right;vertical-align: bottom;padding: 10px 15px;">
                <span>ORDER NO:</span> <span>{{$order->id}}</span><br>
                <span>ORDER DATE:</span>
                <span>{{($order->created_at !=null)?$order->created_at:''}}</span>
            </td>
        </tr>
    </table>
</div>
<section style="padding: 10px;">

    <!-- /.card-header -->
    <table style="border: 1px solid grey;border-collapse: collapse;width: 100%;">
        <thead>
        <tr style="border: 1px solid gray">
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>SL No</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Product Code</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Product Name</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Price</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Qty</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Total</strong></th>
        </tr>
        </thead>
        <tbody>
        @php
            $grandTotal = 0;
        @endphp
        @foreach($items as  $indexKey => $value)
            <tr style="{{($indexKey%2==0)?'background: rgba(184,184,184,0.64)':''}}">
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;text-align: center">{{ $indexKey+1 }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;text-align: center">{{ $value->product_code }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;">{{ $value->name }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;text-align: right">@php echo money_format("%.2n",$value->price); @endphp</td>
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;text-align: center">{{ $value->qty }}</td>
                @php
                    $a = $value->price;
                    $b = $value->qty;
                    $c = $a*$b;
                    $grandTotal += $c;
                @endphp
                <td style="border: 1px solid gray;padding: 5px;text-align: right">@php echo money_format("%.2n",$c); @endphp</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" style="padding: 5px;text-align: right;"><strong>TOTAL</strong></td>
            <td style="padding: 5px;text-align: right"><strong>@php echo money_format("%.2n", $grandTotal); @endphp</strong></td>
        </tr>
       <tr><td colspan="6" style="text-align: right;padding: 5px;"><strong>In Words: @php $f = new NumberFormatter("bn_BD", NumberFormatter::SPELLOUT);echo $f->format($grandTotal); @endphp taka only</strong></td></tr>
        </tbody>
    </table>
</section>

</body>
</html>