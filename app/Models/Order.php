<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'user_id', 'status', 'total_price', 'snipping_address', 'zip_code'
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the order_items for the order
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}
