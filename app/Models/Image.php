<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $appends=['image_url'];

    protected $hidden=['image'];
    
    protected $fillable = [
        'type',
    ];

    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
