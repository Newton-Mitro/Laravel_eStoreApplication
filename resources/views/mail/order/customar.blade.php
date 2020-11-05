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
<section style="padding: 10px;">
    <div>
        <div>
            <p>
                Dear Sir/Madam,<br>
                Thank you very much for choosing <strong>Samabay Bazar</strong> as your online shopping store. Your order has been
                received successfully. <br>Our team-member will communicate with you soon. Please find below
                information of your order for your reference; <br><br>
                Order No: {{$order->id}}<br>
                Date and Time: {{($order->created_at !=null)?$order->created_at:''}}<br>
                Status: {{$order->name}}<br>
            </p>
        </div>
    </div>
    <!-- /.card-header -->
    <table style="border: 1px solid grey;border-collapse: collapse;width: 100%">
        <thead>
        <tr style="border: 1px solid gray">
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Sl. No.</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Product Code</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Product Description</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Rate</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Quantity</strong></th>
            <th style="border: 1px solid grey;border-collapse: collapse;padding: 5px;"><strong>Price</strong></th>
        </tr>
        </thead>
        <tbody>
        @php
            $grandTotal = 0;
        @endphp
        @foreach($items as  $indexKey => $value)
            <tr style="{{($indexKey%2==0)?'background: rgba(184,184,184,0.64)':''}}">
                <td style="border: 1px solid grey;border-collapse: collapse; text-align: center;padding: 5px;">{{ $indexKey+1 }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse; text-align: center;padding: 5px;">{{ $value->product_code }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse;padding: 5px;">{{ $value->name }}</td>
                <td style="border: 1px solid grey;border-collapse: collapse; text-align: right;padding: 5px;">@php echo money_format("%.2n", $value->price) @endphp</td>
                <td style="border: 1px solid grey;border-collapse: collapse;text-align: center;padding: 5px;">{{ $value->qty }} - {{ $value->unit }}</td>
                @php
                    $a = $value->price;
                    $b = $value->qty;
                    $c = $a*$b;
                    $grandTotal += $c;
                @endphp
                <td style="border: 1px solid gray;text-align: right;padding: 5px;">@php echo money_format("%.2n", $c); @endphp</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" style="text-align: right;padding: 5px;"><strong>TOTAL</strong></td>
            <td style="text-align: right;padding: 5px;"><strong>@php echo money_format("%.2n", $grandTotal);@endphp</strong></td>
        </tr>
        <tr><td colspan="6" style="text-align: right;padding: 5px;"><strong>In Words: @php $f = new NumberFormatter("bn_BD", NumberFormatter::SPELLOUT);echo $f->format($grandTotal); @endphp taka only</strong></td></tr>
        </tbody>
    </table>
    <br>
    Best regards, <br>
    Samabay Bazar
</section>
<div style="background-color: #3dffd1;padding-top: 5px;padding-bottom: 5px;padding-left: 10px;padding-right: 10px;">
    <table>
        <tr>
            <td><img src="{{asset('dist/img/logo.png')}}" alt="" width="40px"
                     style="background-color: #3dffd1; width: 40px"></td>
            <td><span style="background-color: #3dffd1">
            <strong>Rev. Fr. Charles J. Young Bhaban</strong><br>
            173/1/A, East Tejturi Bazar, Tejgaon, Dhaka-1215.<br>
            Phone: 58152640
        </span></td>
        </tr>
    </table>
</div>
</body>
</html>