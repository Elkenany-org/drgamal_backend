<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use File;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::paginate(10);
        return view('Achievements.index',compact('achievements'));
    }

    public function create()
    {
        return view('Achievements.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'description'=> 'required',
            'image'=> 'required'
        ]);

        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/achievements';
        $request->image->move($path , $image_name);
        
        Achievement::create([
            'description' => $request->description,
            'image'=> $image_name
        ]);
    
        return redirect()->route('achievements.index');
    }

    public function edit($id)
    {
        $achievement = Achievement::find($id)->first();
        return view('Achievements.edit',compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::find($id)->first();

        if($request->image != null)
        {
            $image_path = public_path('images/achievements/'.$achievement->image);
            if(File::exists($image_path))
                unlink($image_path);
    
            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/achievements';
            $request->image->move($path , $image_name);
            
            $achievement->image = $image_name;
        }
        $achievement->description = $request->description;
        $achievement->save();

        return redirect()->route('achievements.index');
    }

    public function delete($id)
    {
        $achievement = Achievement::find($id)->first();

        $image_path = public_path('images/achievements/'.$achievement->image);
        if(File::exists($image_path))
            unlink($image_path);

        $achievement->delete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        return $this->description_search($request , 'description' , new Achievement() , 'achievements' , 'achievements',false,'index');
    }
}
