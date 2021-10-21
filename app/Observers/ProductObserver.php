<?php

namespace App\Observers;

use App\Mail\SendMailCreateProduct;
use App\Mail\SendMailUpdateProduct;
use App\Models\Product;
use App\Repositories\Contracts\StoreRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    private $repository;

    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function created(Product $product)
    {
        $store = $this->repository->findById($product->store_id);
        Mail::to($store->email)->send(new SendMailCreateProduct($product));
    }

    public function updated(Product $product)
    {
        $store = $this->repository->findById($product->store_id);
        Mail::to($store->email)->send(new SendMailUpdateProduct($product));
    }
}
