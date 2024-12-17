<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $fillable =['title','slug','publish'];

    public function team(){
        return $this->hasMany('App\Models\Team','teamcategory_id');
    }
}
