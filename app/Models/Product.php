<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sku', 'price'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function reseller()
    {
        return $this->belongsTo('App\Models\Reseller');
    }
}
