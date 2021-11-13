<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function productSupplier(){
        return $this->hasMany('App\Models\ProductSupplier');
    }
    public function sale_Details(){
        return $this->hasMany('App\Models\Sale_Detail');
    }
}
