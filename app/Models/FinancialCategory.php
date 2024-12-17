<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialCategory extends Model
{
    protected $fillable =['title','slug','publish'];

    public function financialInformations(){
        return $this->hasMany('App\Models\FinancialInformation','category_id');
    }
}
