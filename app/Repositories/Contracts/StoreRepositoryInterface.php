<?php

namespace App\Repositories\Contracts;


interface StoreRepositoryInterface 
{
    public function store($values);
    public function update($id, $values);
    public function findAll();
    public function findById($id);
    public function destroy($id);
    public function findProductsByStoreId($store_id);
}