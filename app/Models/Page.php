<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable =['title','slug','description','image1','image2','our_mission_desc','our_vission_desc','publish','main','heading','quote','name','position'];
}
