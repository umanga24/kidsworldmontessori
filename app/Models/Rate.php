<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable =['month','base_rate','category_id','publish'];

    public function rate_category(){
        return $this->belongsTo('App\Models\RateCategory','category_id');
    }
}
