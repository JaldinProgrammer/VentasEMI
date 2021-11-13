<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total',
        'sale_id',
        'payment__type_id'
    ];
    protected $dates = ['created_at', 'updated_at', 'date'];
    public function payment_Type(){
        return $this->belongsTo('App\Models\Payment_Type');
    }

    public function sale(){
        return $this->belongsTo('App\Models\Sale');
    }

}
