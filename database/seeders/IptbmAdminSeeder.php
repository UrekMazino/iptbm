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
        IptbmAdmin::create([
            'name'=>'Andy Mark Servania',
            'component'=>'ABH',
            'email'=>'rdesystem@capsu.edu.ph',
            'password'=>Hash::make('iptbmadmin12345'),
        ]);
    }
}
