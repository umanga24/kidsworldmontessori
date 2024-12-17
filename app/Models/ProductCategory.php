<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['title','slug','publish'];

    public function products(){
        return $this->hasMany('App\Models\Product','productcategory_id');
    }
}
