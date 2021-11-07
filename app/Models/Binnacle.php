<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    use HasFactory;
    protected $fillable = [
        'action',
        'entity',
        'table',
        'account_id'
    ];
    public function account(){
        return $this->belongsTo('App\Models\Account');
    }
}
