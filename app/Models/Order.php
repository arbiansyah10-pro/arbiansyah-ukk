<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'delivery_method', 'payment_method', 'notes', 'total_price'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}