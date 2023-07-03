<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Products;

class OrdersItems extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'total_price'];
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
