<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Admin ',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
            ]);
    }
}
