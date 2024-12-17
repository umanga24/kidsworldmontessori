<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = ['title','slug','description','short_description','image','banner_image','publish'];
}
