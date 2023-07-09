<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class ApiCompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        
        $path = '/images/companies/';
        foreach($companies as $company)
        {
            $company->image = $path.$company->image;
        }
        return response()->json($companies, 200);
    }
}
