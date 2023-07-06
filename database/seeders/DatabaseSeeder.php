<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'marwan',
            'email' => 'marwanmohamed7887@gmail.com',
            'password' => Hash::make($request->password)
        ]);
        About::insert([
            'about' => 'No Data!'
        ]);
    }
}
