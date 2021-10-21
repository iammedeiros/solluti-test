<?php

namespace App\Observers;

use App\Mail\SendMailCreateProduct;
use App\Mail\SendMailUpdateProduct;
use App\Models\Product;
use App\Models\Store;
use App\Notifications\NotifyCreateProduct;
use App\Notifications\NotifyUpdateProduct;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    public function created(Product $product)
    {
        Mail::to('to@email.com')->send(new SendMailCreateProduct($product));
    }

    public function updated(Product $product)
    {
        Mail::to('to@email.com')->send(new SendMailUpdateProduct($product));
    }
}
