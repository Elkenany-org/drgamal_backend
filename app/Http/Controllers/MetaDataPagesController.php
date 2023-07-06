<?php

namespace App\Http\Controllers;

use App\Models\Meta_data_pages;
use Illuminate\Http\Request;

class MetaDataPagesController extends Controller
{
    
    public function index()
    {
        $Meta_data = Meta_data_pages::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meta_data_pages  $meta_data_pages
     * @return \Illuminate\Http\Response
     */
    public function show(Meta_data_pages $meta_data_pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meta_data_pages  $meta_data_pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta_data_pages $meta_data_pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meta_data_pages  $meta_data_pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta_data_pages $meta_data_pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meta_data_pages  $meta_data_pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta_data_pages $meta_data_pages)
    {
        //
    }
}
