<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image_url'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
