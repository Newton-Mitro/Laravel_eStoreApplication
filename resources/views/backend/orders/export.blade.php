<table>
    <thead>
    <tr>
        <?php $grand_total = 0; ?>
        <th colspan="5"><h4>
                <b>All Orders</b>
            </h4></th>
    </tr>
    <tr></tr>
    </thead>
    @foreach($order_data as $r)
        <thead>
        <tr>
            <th colspan="2"><b>Order ID</b></th>
            <th colspan="3">{{ $r->id }}</th>
        </tr>
        <tr>
            <th colspan="2"><b>Order Date</b></th>
            <th colspan="3">{{ $r->created_at->format('d M Y') }}</th>
        </tr>
        <tr>
            <th colspan="2"><b>Order Status</b></th>
            @if($r->order_status_id==1)
                <th colspan="3">New/Received Order</th>
            @elseif($r->order_status_id==1)
                <th colspan="3">Sale/Confirmed Order</th>
            @else
                <th colspan="3">Canceled Order</th>
            @endif

        </tr>
        <tr>
            <th colspan="2"><b>Customer Name</b></th>
            <th colspan="3">{{ $r->shipping_f_name }} {{$r->shipping_f_name}}</th>
        </tr>
        <tr>
            <th colspan="2"><b>Customer Phone</b></th>
            <th colspan="3">{{ $r->shipping_phone }}</th>
        </tr>
        <tr>
            <th colspan="2"><b>Customer Address</b></th>
            <th colspan="3">{{ $r->shipping_address }}</th>
        </tr>
        <tr><th colspan="5"><b>Order Items</b></th></tr>
        <tr>
            <th><b>SL.</b></th>
            <th><b>Product Name</b></th>
            <th><b>Quantity</b></th>
            <th><b>Price</b></th>
            <th><b>Total</b></th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0;
        $sub_total = 0; ?>
        @php
            $details = App\Models\SB_OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
              ->join('products', 'products.id', '=', 'order_details.product_id')
              ->select('order_details.id','order_details.quantity','order_details.sale_price','products.product_name')
              ->where('orders.id', '=', $r->id)
              ->get();
        @endphp
        @foreach($details as $row)
            <?php $count++; ?>
            <tr class='small'>
                <td>{{$count}}</td>
                <td>{{$row->product_name}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->sale_price}}</td>
                <td>{{$row->sale_price * $row->quantity}}</td>
            </tr>
            <?php $sub_total += ($row->sale_price * $row->quantity); ?>
        @endforeach
        <tr>
            <td><b>Sub-total</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$sub_total}}</td>
        </tr>
        <tr></tr>
        </tbody>
        <?php $grand_total += $sub_total;  ?>
    @endforeach
    <tr>
        <td><b>Grand Total</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$grand_total}}</td>
    </tr>
</table>