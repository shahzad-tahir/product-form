<?php

namespace App\DatabaseJson\Models;

use DatabaseJson\Model;

class Product extends Model
{
    /**
     * Get the total value.
     *
     * @return float|int
     */
    public function getTotalValueAttribute(): float|int
    {
        return $this->price * $this->quantity;
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total_value'];

    protected $casts = [
        'price' => 'integer',
        'quantity' => 'integer',
    ];
}
