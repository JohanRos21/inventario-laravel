<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'minimum_stock',
        'is_active',
    ];
    
    protected $casts = [
         'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
public function category()
{
    return $this->belongsTo(Category::class);
}

public function stockMovements()
{
    return $this->hasMany(StockMovement::class);
}

public function hasLowStock()
{
    return $this->stock <= $this->minimum_stock;
}
}
