<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;


class ApiImageController extends Controller
{
    public function dr_image()
    {
        $image = Image::where('type' , 'الدكتور')->first();
        $path = '/images/home/';
        return response()->json($path.$image->image, 200);
    }
    public function maincompany_image()
    {
        $image = Image::where('type' , 'الشركة الرئيسية')->first();
        $path = '/images/home/';
        return response()->json($path.$image->image, 200);
    }
    public function achievementspage_image()
    {
        $image = Image::where('type' , 'الانجازات')->first();
        $path = '/images/home/';
        return response()->json($path.$image->image, 200);
    }
    public function newspage_image()
    {
        $image = Image::where('type' , 'الا')->first();
        $path = '/images/home/';
        return response()->json($path.$image->image, 200);
    }
    public function secondarycompanies_image()
    {
        $images = Image::where('type' , 'شركة فرعية')->get();
        $images_path = array();
        $path = '/images/home/';
        foreach($images as $image)
        {
            array_push($images_path , $path.$image->image);
        }
        return response()->json($images_path, 200);
    }

    
}
