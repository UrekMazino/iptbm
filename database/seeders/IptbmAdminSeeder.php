<?php

namespace Database\Seeders;

use App\Models\admins\IptbmAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class IptbmAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IptbmAdmin::create([
            'name'=>'Andy Mark Servania',
            'component'=>'iptbm',
            'email'=>'andymarkservania1991@gmail.com',
            'password'=>Hash::make('iptbmadmin12345'),
        ]);
    }
}
