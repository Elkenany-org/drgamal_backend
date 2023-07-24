<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\About;
use App\Models\Company;


class ApiHomeController extends Controller
{
    public function home()
    {
        $image = Image::where('type' , 'الدكتور')->first();
        $path = '/images/home/';
        // $image = url('/').$path.$image->image;
        
        $path = '/images/home/';
        $about = About::where('id' , 1)->first();
        
        $companies = Company::all(
            
        );
        return response()->json($image->image_url, 200);
        // return response()->json($companies, 200);
        // return response()->json($image->getImageLink($path), 200);
        
        $logos = Image::where('type' , 'الشركة الرئيسية')->orWhere('type' , 'شركة فرعية')->get(); 

        $ret = (object) [
            'image' => $image,
            'about' => $about,
            'companies' => $companies,
            'logos' => $logos
        ];
        
        return response()->json($ret, 200);
        return response()->json($ret, 200);
    }
}