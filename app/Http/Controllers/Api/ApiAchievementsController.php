<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Image;
class ApiAchievementsController extends Controller
{
    //
    public function index()
    {
        $achievements = Achievement::latest()->get();
        $mainImage = Image::where('type','الاخبار')->first();
        return response()->json(['data'=>$achievements,'mainImage'=>$mainImage->image_url], 200);
    }
}
