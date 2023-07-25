<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $appends=['image_url'];

    protected $fillable = [
        'title',
        'description',
        'year',
        'image'
    ];

    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
