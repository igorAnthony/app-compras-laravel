<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class OrdersItems extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'total_price'];
    
}
