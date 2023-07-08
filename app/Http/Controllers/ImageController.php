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
        $image = Image::where('type','الدكتور')->first();
        $image1 = Image::where('type','الشركة الرئيسية')->first();
        if($image == null && $image1 == null)
            $types = ['--لا شئ--' , 'الدكتور' , 'الشركة الرئيسية' , 'شركة فرعية'];
        if($image == null && $image1 != null)
            $types = ['--لا شئ--' , 'الدكتور' , 'شركة فرعية'];
        if($image != null && $image1 == null)
            $types = ['--لا شئ--' , 'الشركة الرئيسية' , 'شركة فرعية'];
        if($image != null && $image1 != null)
            $types = ['شركة فرعية'];
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

        $image_path = public_path('images/home/'.$image->image);
        if(File::exists($image_path))
            unlink($image_path);

        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/home';
        $request->image->move($path , $image_name);
        
        $image->image = $image_name;
        $image->save();

        return redirect()->route('Images.index');
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
