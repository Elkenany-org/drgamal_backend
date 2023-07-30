<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $hidden = ['image'];
    protected $appends=['image_url'];
    
    protected $fillable = [
        'description',
    ];

    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
