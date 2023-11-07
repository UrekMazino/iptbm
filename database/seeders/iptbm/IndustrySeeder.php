<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name' => 'CROPS'
            ],
            [
                'name' => 'LIVESTOCK'
            ],
            [
                'name' => 'MARINE AND INLAND AQUATIC'
            ],
            [
                'name' => 'FORESTRY'
            ],
            [
                'name' => 'ENVIRONMENTAL SERVICES'
            ],
            [
                'name' => 'CLIMATE CHANGE ADAPTATION AND DISASTER RISK REDUCTION'
            ],
        ];

        foreach ($data as $key => $val){
            IptbmIndustry::create($val);
        }
    }
}
