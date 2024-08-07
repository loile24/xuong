<?php

namespace App\Mail;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class XacThucMail extends Mailable
{
    use Queueable, SerializesModels;

    public $don_hang;
    

    public function __construct(Bill $don_hang)
    {
        $this->don_hang = $don_hang;
    }

   //build message
   public function build(){
    return $this->subject('Xác Nhận Mua Hàng')
    ->markdown('client.mails.mailConfirmBill')
    ->with('don_hang', $this->don_hang);

}   
}
