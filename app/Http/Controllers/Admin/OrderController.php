<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($status)
    {
        if ($status == 0) {
            $orders = Order::orderby('id', 'DESC')->get();
        } elseif ($status > 0) {
            $orders = Order::where('status_id', $status)->orderby('id', 'DESC')->get();
        }

        return view('backend.orders.read')->with('orders', $orders)->with('status', $status);
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderDetails = $order->order_details;
        $statuses = Status::all();

        return view('backend.orders.details')->with('order', $order)->with('orderDetails', $orderDetails)->with('statuses', $statuses);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_id = $request->status_id;
        $order->save();
        return redirect()->back()->with('success', 'Status changed successfully.');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }


    public function filterReport()
    {
        $statuses = Status::all();
        return view('backend.orders.report')->with('statuses', $statuses);
    }

    public function reportQuery(Request $request)
    {
        $s_date = strtotime($request->from_date);
        $n_date = strtotime($request->to_date);
        $status = $request->status;

        $start_date = date('Y-m-d 00:00:00', $s_date);
        $end_date = date('Y-m-d 23:59:59', $n_date);
        if ($status!=0) {
            $order_data = Order::whereBetween('created_at', [$start_date, $end_date])->where('status_id', $status)->get();
        } else {
            $order_data = Order::whereBetween('created_at', [$start_date, $end_date])->get();
        }
//        dd($order_data);

        return view('backend.orders.print')
            ->with('start_date', $start_date)
            ->with('end_date', $end_date)
            ->with('order_data', $order_data)
            ->with('order_status_id', $status);

    }
}
