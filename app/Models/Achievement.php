<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $appends=['image_url'];

    protected $fillable = [
        'description',
        'image'
    ];

    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
