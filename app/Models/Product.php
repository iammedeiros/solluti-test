<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['formated_price'];

    protected $fillable = [
        'store_id',
        'name',
        'price'
    ];

    protected $hidden = ['price'];

    public function getFormatedPriceAttribute()
    {
        return "R$ " . number_format($this->price, 2, ',', '.');
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
