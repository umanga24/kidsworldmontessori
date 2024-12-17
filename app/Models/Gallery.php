<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'image'];

    public function galleryDetails()
    {
        return $this->hasMany(GalleryDetail::class);
    }
}
