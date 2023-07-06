<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{ 
 
    public function edit($id)
    {
        $article = Article::where('id' , 1);
        return view('About.edit')->with('article' , $article);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'about' => 'required',
        ]);
        $about = About::find(1);
        
        $about->about = $request->about;
        $about->save();
        
        return redirect()->route('Home');
    }
}
