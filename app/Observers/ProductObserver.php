<?php

namespace App\Observers;

use App\Mail\SendMailCreateProduct;
use App\Mail\SendMailUpdateProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    public function created(Product $product)
    {
        $store = Store::find($product->store_id);
        Mail::to($store->email)->send(new SendMailCreateProduct($product));
    }

    public function updated(Product $product)
    {
        $store = Store::find($product->store_id);
        Mail::to($store->email)->send(new SendMailUpdateProduct($product));
    }
}
