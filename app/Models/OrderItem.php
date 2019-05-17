<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    /**
     * Get the product that owns the order_item.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
