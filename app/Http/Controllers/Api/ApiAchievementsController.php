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
        return response()->json(['data'=>$achievements], 200);
        $ret = [];
        foreach($news as $event)
        {
            return response()->json($event, 200);
            array_push($ret , $event['data']);
        }
        return response()->json($ret, 200);
    }
}
