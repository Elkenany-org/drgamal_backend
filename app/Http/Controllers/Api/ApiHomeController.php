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
        $images=Image::all();

        foreach($images as $img){
            if($img->type == "الدكتور"){
                $list['data']['images']['doctor']=$img;
            }else if($img->type == "الشركة الرئيسية"){
                $list['data']['images']['main_company']=$img;
            }else if($img->type == "شركة فرعية"){
                $list['data']['images']['sub_company'][]=$img;
            }
        }
        $about = About::where('id' , 1)->first();
        $list['data']['about'] = $about;


        $companies = Company::all();
        $list['data']['founder_of'] = $companies;
        
        
        return response()->json($list['data'], 200);
    }
}