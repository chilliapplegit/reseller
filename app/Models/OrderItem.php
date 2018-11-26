<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * Fillable table columns.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sku',
        'qty',
        'price'
    ];

    /**
     * Get the order items belong to order.
     *
     * @return collection
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
