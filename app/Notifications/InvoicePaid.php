<?php

namespace App\Notifications;

use App\Models\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;
    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $orderId =  $this->details->id;
        $items = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')
            ->join('users', 'users.id', '=', 'order_details.user_id')
            ->join('shipping_details', 'shipping_details.id', '=', 'order_details.shipping_detail_id')
            ->where('order_id','=',$orderId)
            ->select('order_details.*', 'products.*','users.*','shipping_details.*')
            ->get();

        return (new MailMessage)->subject('An order has been received.')->view(
            'mail.order.admin', ['order' => $this->details, 'items'=>$items]
        );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
