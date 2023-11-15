<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbhProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbhProfile::create([
            'sample'=>'Abh Profile'
        ]);
    }
}
