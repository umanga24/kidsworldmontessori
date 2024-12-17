<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryDetail extends Model
{
    protected $fillable = ['image2', 'gallery_id'];

    // protected $casts = [
    //     'multipleimages' => 'array',
    // ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
