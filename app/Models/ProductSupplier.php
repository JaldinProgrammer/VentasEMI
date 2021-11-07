<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost',
        'total',
        'amount',
        'product_id',
        'supplier_id',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

   
}
