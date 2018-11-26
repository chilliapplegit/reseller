<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Fillable table columns.
     *
     * @var array
     */
    protected $fillable = [
        'reseller_id',
        'customer_id'
    ];

    /**
     * Get the order items for the order.
     *
     * @return object
     */
    public function orderItem()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    /**
     * Get the reseller for the order.
     *
     * @return object
     */
    public function reseller()
    {
        return $this->belongsTo('App\Models\Reseller');
    }

    /**
     * Get the user for the order.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('App\User','customer_id');
    }

    /**
     * Get the order total.
     *
     * @return object
     */
    public function getTotalPrice() {
        return $this->orderItem->sum(function($orderItem) {
          return $orderItem->qty * $orderItem->price;
        });
    }
}
