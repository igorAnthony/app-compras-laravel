<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'id_category',
        'image',
        'price',
        'stars',
        'location',
        'visibility',
    ];

    protected $casts = [
        'id_category' => 'integer',
        //'price' => 'decimal:2',
        //'stars' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
