<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableData extends Seeder
{
    
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@starlight.com',
            'password' => Hash::make(12345678),
            'role' => 'admin'
        ]);
    }
    
}
