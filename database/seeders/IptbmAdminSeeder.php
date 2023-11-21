<?php

namespace Database\Seeders;

use App\Models\admins\AbhAdmin;
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
        $data=[
            [
                'name'=>'Andy Mark Servania IPTBM',
                'component'=>'IPTBM',
                'email'=>'andymarkservania1991@gmail.com',
                'password'=>Hash::make('staff12345'),
            ],
            [
                'name'=>'Andy Mark Servania ABH',
                'component'=>'ABH',
                'email'=>'rdesystem@capsu.edu.ph',
                'password'=>Hash::make('staff12345'),
            ],
        ];
        foreach ($data as $val)
        {
            IptbmAdmin::create($val);
        }
    }
}
