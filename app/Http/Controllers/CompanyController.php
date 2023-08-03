<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use File;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('Companies.index',compact('companies'));
    }
    
    public function create()
    {
        return view('Companies.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=> 'required',
            'description'=> 'required',
            'year'=> 'required',
            'image'=> 'required',
            'logo'=> 'required',
        ]);
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/companies';
        $request->image->move($path , $image_name);

        $logo_name = $request->logo->getClientOriginalName();
        $logo_name = time().$logo_name;
        $request->logo->move($path , $logo_name);


        if($request->link != null){
            Company::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'year'=> $request->year,
                'image'=> $path.'/'.$image_name,
                'logo'=> $path.'/'.$logo_name,
                'link'=> $request->link,
            ]);
        }else{
            Company::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'year'=> $request->year,
                'image'=> $path.'/'.$image_name,
                'logo'=> $path.'/'.$logo_name,

            ]);
        }
        return redirect()->route('companies.index');
    }

    
    public function edit($id)
    {
        $company = Company::find($id);
        return view('Companies.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
        ]);
        $company = Company::find($id);

        if($request->image != null)
        {
            $image_path = public_path('images/companies/'.$company->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/companies';
            $request->image->move($path , $image_name);
            
            $company->image = $path.'/'.$image_name;
        }

        if($request->logo != null)
        {
            if($company->logo !=null){
            $logo_path = public_path('images/companies/'.$company->logo);
            if(File::exists($logo_path))
                unlink($logo_path);
            }


            $logo_name = $request->logo->getClientOriginalName();
            $logo_name = time().$logo_name;
            $path = 'images/companies';
            $request->logo->move($path , $logo_name);
            
            $company->logo = $path.'/'.$logo_name;
        }

        $company->title = $request->title;
        $company->description = $request->description;
        $company->year = $request->year;

        if($request->link != null){
            $company->link = $request->link;
        }
        $company->save();
        return redirect()->route('companies.index');
    }

    public function destroy($id)
    {
        $company = Company::where('id', $id)->first();
        
        $image_path = public_path('images/companies/'.$company->image);
        if(File::exists($image_path)) 
            unlink($image_path);

        $logo_path = public_path('images/companies/'.$company->logo);
            if(File::exists($logo_path)) 
                unlink($logo_path);

        $company->delete();
        return redirect()->route('companies.index'); 
    }
}
