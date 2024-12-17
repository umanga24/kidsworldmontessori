<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['title','slug','productcategory_id','description','image','publish','features','document'];

    public function productCategory(){
        return $this->belongsTo('App\Models\productCategory','productcategory_id');
    }
}
