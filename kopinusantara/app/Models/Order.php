<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_date',
        'total_amount',
        'payment_method',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
