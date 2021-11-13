<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nit',
        'gender',
        'phone',
        'email',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
