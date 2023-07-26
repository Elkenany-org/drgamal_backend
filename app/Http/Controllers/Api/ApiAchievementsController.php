<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
class ApiAchievementsController extends Controller
{
    //
    public function index()
    {
        $achievements = Achievement::latest()->get();
        $mainImage = Image::where('type','الاخبار')->get();
        return response()->json(['data'=>$achievements,'mainImage'=>$mainImage], 200);
    }
}
