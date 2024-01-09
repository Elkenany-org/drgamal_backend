<?php

namespace Database\Seeders;

use App\Models\About;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AboutTableData extends Seeder
{
    
    public function run()
    {
        About::insert([
            'about' => 'No Data!'
        ]);
    }
    
}
