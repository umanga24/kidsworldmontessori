<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateCategory extends Model
{
    protected $fillable =['title','slug','publish'];

    public function rates(){
        return $this->hasMany('App\Models\Rate','category_id');
    }
}
