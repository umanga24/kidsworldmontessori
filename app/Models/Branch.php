<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable =['name','category_id','location','phone','email','map','publish','full_address','timing','sort_order'];
}
