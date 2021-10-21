<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCreateProduct extends Mailable
{
    use Queueable, SerializesModels;

    private $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('from@email.com')
                ->view('emails.emailCreateProduct', ['product' => $this->product]);
    }
}
