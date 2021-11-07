<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'nit',
        'date',
        'dedt',
        'total',
        'totalBeforeTax',
        'tax',
        'user_id',
        'person_id',
    ];

    public function payments(){
        return $this->hasMany('App\Models\Payment');
    }
    public function sale_Details(){
        return $this->hasMany('App\Models\Sale_Detail');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function person(){
        return $this->belongsTo('App\Models\Person');
    }
    

}
