<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{ 
 
    public function edit()
    {
        $about = About::where('id' , 1)->first();
        return view('About.edit')->with('about' , $about);
    }

    public function update(Request $request)
    {
        $request->validate([
            'about' => 'required',
        ]);
        $about = About::find(1);
        
        $about->about = $request->about;
        $about->save();
        
        return redirect()->route('home');
    }
}
