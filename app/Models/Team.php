<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name','image','teamcategory_id','phone','email','location','publish','position','sort_order'];

    public function teamCategory(){
        return $this->belongsTo('App\Models\TeamCategory','teamcategory_id');
    }
}
