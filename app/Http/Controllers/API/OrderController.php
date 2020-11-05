<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShippingDetail;
use App\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function placeOrder(Request $request)
    {
        $shippingDetail = new ShippingDetail();
        $shippingDetail->shipping_f_name = $request->shipping_f_name;
        $shippingDetail->shipping_l_name = $request->shipping_l_name;
        $shippingDetail->shipping_address = $request->shipping_address;
        $shippingDetail->shipping_phone = $request->shipping_phone;
        $shippingDetail->shipping_email = $request->shipping_email;
        if ($shippingDetail->save()) {
            $usersTimezone = 'Asia/Dhaka';
            $date = new DateTime('now', new DateTimeZone($usersTimezone));
            $result = 0;
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->status_id = 1;
            $order->service_zone_id = $request->service_zone_id;
            $order->shipping_cost = $request->shipping_cost;
            $order->created_at = $date->format('Y-m-d H:i:s');
            $order->shipping_detail_id =$shippingDetail->id;

            if ($order->save()) {
                $data = $request->order_items;
                $order_items = json_decode($data, true);
                foreach ($order_items as $key => $item) {
                    $orderDetails = new OrderDetail();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->product_id = $item['id'];
                    $orderDetails->product_code = $item['product_code'];
                    $orderDetails->product_name = $item['product_name'];
                    $orderDetails->sale_price = $item['sale_price'];
                    $orderDetails->quantity = $item['quantity'];
                    $orderDetails->amount = $item['sale_price'] * $item['quantity'];
                    if ($orderDetails->save()) {
                        $result = 1;
                    } else {
                        $result = 0;
                    }
                }
            } else {
                $result = 0;
            }

            if ($result == 1) {
                $user = User::find($order->user_id);
                $orderwihtstatus = Order::join('statuses', 'statuses.id', '=', 'orders.status_id')
                    ->select('orders.*', 'statuses.status_name')
                    ->where('orders.id', $order->id)
                    ->first();
                $admin = User::find(1);
//                $admin->notify(new OrderPlaced());
//                $user->notify(new OrderPlaced());
                return "success";
            } else {
                return "error";
            }
        }


    }

    public function store(Request $request)
    {

        $brand = new Brand();
        $brand->brand_image = $request->brand_image;
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return 'success';
    }


}
