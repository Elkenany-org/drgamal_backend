<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;



class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return response()->json($news, 200);
    }

    public function show($id)
    {
        $event = News::where('id' , $id)->first();
        return response()->json($event, 200);
    }

    public function search(Request $request)
    {
        $result = $this->description_search($request , 'description' , new News() , 'News' , 'news',false,'index',true);
        return response()->json($result,200);
    }
}
