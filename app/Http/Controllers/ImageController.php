<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::paginate(10);
        return view('Images.index',compact('images'));
    }

    public function create()
    {
        $types = array('--لا شئ--');
        
        $image1 = Image::where('type','الدكتور')->first();
        $image2 = Image::where('type','الشركة الرئيسية')->first();
        $image3 = Image::where('type','الانجازات')->first();
        $image4 = Image::where('type','الاخبار')->first();
        if($image1 == null)
            array_push($types , 'الدكتور');
        if($image2 == null)
            array_push($types , 'الشركة الرئيسية');
        if($image3 == null)
            array_push($types , 'الانجازات');
        if($image4 == null)
            array_push($types , 'الاخبار');
            
        array_push($types , 'شركة فرعية');
        return view('Images.create',compact('types'));
    }

    public function store(Request $request)
    {
        if($request->type == '--لا شئ--')
        {
            return redirect()->back()->withErrors(['msg' => 'من فضلك اختر النوع!']);
        }
        else
        {
            $this->validate($request , [
                'image'=> 'required'
            ]);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/home';
            $request->image->move($path , $image_name);
            
            Image::create([
                'type' => $request->type,
                'image'=> $image_name
            ]);
        }
        return redirect()->route('images.index');
    }

    public function edit($id)
    {
        $image = Image::find($id)->first();
        return view('Images.edit',compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::find($id)->first();

        if($request->image != null)
        {
            $image_path = public_path('images/home/'.$image->image);
            if(File::exists($image_path))
                unlink($image_path);
    
            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/home';
            $request->image->move($path , $image_name);
            
            $image->image = $image_name;
            $image->save();
        }

        return redirect()->route('images.index');
    }

    public function destroy($id)
    {
        $image = Image::find($id)->first();

        $image_path = public_path('images/home/'.$image->image);
        if(File::exists($image_path))
            unlink($image_path);

        $image->delete();
        return redirect()->back();
    }
}
