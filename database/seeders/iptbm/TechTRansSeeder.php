<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmTechTransPathway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechTRansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name'=>'Extension'
            ],
            [
                'name'=>'Deployment'
            ],
            [
                'name'=>'Commercialization'
            ],
        ];

        IptbmTechTransPathway::insert($data);
    }
}
