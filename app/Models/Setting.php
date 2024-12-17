<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable= ['address','phone','email','facebook','instagram','twitter','linkedin','map','about_us','image1','image2','services_home','contactus_text','sunday','monday','tuesday','wednesday','thursday','friday','saturday','max_price','min_price','closing_price','previous_closing','difference','as_of'];
}
