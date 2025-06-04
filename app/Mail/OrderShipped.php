<?php
// app/Mail/OrderShipped.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $pdf;

    public function __construct(Order $order, $pdf)
    {
        $this->order = $order;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Your Order Invoice #'.$this->order->id)
                    ->markdown('emails.orders.shipped')
                    ->attachData($this->pdf, 'invoice-'.$this->order->id.'.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}