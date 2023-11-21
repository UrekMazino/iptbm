<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhAgency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbhAgency::create([
            'abh_regions_id'=>'1',
            'abh_profiles_id'=>'1',
            'name'=>'Abh Agency Name',
            'address'=>'Abh Agency Address'
        ]);
    }
}
