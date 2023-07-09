<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;



class ApiAboutController extends Controller
{
    public function show()
    {
        $about = About::where('id' , 1)->first();
        return response()->json($about, 200);
    }
}
