<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\Store;
use App\Repositories\Contracts\StoreRepositoryInterface;

class StoreRepository extends AbstractRepository implements StoreRepositoryInterface
{
    protected $model = Store::class;

    public function findProductsByStoreId($store_id)
    {
        return Product::where('store_id', $store_id)->get();
    }
}