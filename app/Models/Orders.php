<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersItems;
use App\Models\Address;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'address_id', 'payment_method', 'order_status','total_price'];

    public function ordersItems()
    {
        return $this->hasMany(OrdersItems::class);
    }
    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
