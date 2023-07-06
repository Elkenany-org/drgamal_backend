<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutTableData extends Seeder
{
    public function run()
    {
        About::insert([
            'about' => 'No Data!'
        ]);
    }
}
