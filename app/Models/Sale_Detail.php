<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'total',
        'sale_id',
        'product_id'
    ];

    public function sale(){
        return $this->belongsTo('App\Models\Sale');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
