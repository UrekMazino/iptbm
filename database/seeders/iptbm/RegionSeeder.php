<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iptbm_regions = array(
            array('id' => '1','name' => 'Region I – Ilocos Region','rrdcc_chair' => NULL,'consortium' => 'ILAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '2','name' => 'Region II – Cagayan Valley','rrdcc_chair' => NULL,'consortium' => ' CVAARRD','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '3','name' => 'Region III – Central Luzon','rrdcc_chair' => NULL,'consortium' => 'CLAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '4','name' => 'NCR – National Capital Region','rrdcc_chair' => NULL,'consortium' => NULL,'consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '5','name' => 'Region IV‑A – CALABARZON','rrdcc_chair' => NULL,'consortium' => 'STAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '6','name' => 'Region IV-B - Southern Tagalog','rrdcc_chair' => NULL,'consortium' => 'MAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '7','name' => 'Region V – Bicol Region','rrdcc_chair' => NULL,'consortium' => 'BCAARRD','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '8','name' => 'Region VI – Western Visayas','rrdcc_chair' => NULL,'consortium' => 'WESVARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '9','name' => 'Region VII – Central Visayas','rrdcc_chair' => NULL,'consortium' => 'CVAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '10','name' => 'Region VIII – Eastern Visayas','rrdcc_chair' => NULL,'consortium' => 'ViCARP','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '11','name' => 'Region IX – Zamboanga Peninsula','rrdcc_chair' => NULL,'consortium' => 'WESMAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '12','name' => 'Region X – Northern Mindanao','rrdcc_chair' => NULL,'consortium' => 'NOMCAARRD','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '13','name' => 'Region XI – Davao Region','rrdcc_chair' => NULL,'consortium' => 'SMAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '14','name' => 'Region XII – SOCCSKSARGEN','rrdcc_chair' => NULL,'consortium' => 'SOXAARRDEC','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '15','name' => 'Region XIII – Caraga','rrdcc_chair' => NULL,'consortium' => 'CCAARRD','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '16','name' => 'CAR – Cordillera Administrative Region','rrdcc_chair' => NULL,'consortium' => 'CorCAARRD','consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '17','name' => 'BARMM – Bangsamoro Autonomous Region in Muslim Mindanao','rrdcc_chair' => NULL,'consortium' => NULL,'consortium_director' => NULL,'created_at' => '2023-08-18 03:13:19','updated_at' => '2023-08-18 03:13:19'),
            array('id' => '18','name' => 'Sample Region','rrdcc_chair' => 'Andy Mark','consortium' => 'AMS','consortium_director' => 'James Dela Cruz','created_at' => '2023-08-28 19:49:08','updated_at' => '2023-08-28 19:49:08')
        );

        $data=[

            [
                'name'=>'Region I – Ilocos Region',
                'consortium'=>'ILAARRDEC',
            ],
            [
                'name'=>'Region II – Cagayan Valley',
                'consortium'=>' CVAARRD',
            ],
            [
                'name'=>'Region III – Central Luzon',
                'consortium'=>'CLAARRDEC',

            ],
            [
                'name'=>'NCR – National Capital Region',
            ],
            [
                'name'=>'Region IV‑A – CALABARZON',
                'consortium'=>'STAARRDEC',

            ],
            [
                'name'=>'Region IV-B - Southern Tagalog',
                'consortium'=>'MAARRDEC',

            ],
            [
                'name'=>'Region V – Bicol Region',
                'consortium'=>'BCAARRD',

            ],
            [
                'name'=>'Region VI – Western Visayas',
                'consortium'=>'WESVARRDEC',

            ],
            [
                'name'=>'Region VII – Central Visayas',
                'consortium'=>'CVAARRDEC',

            ],
            [
                'name'=>'Region VIII – Eastern Visayas',
                'consortium'=>'ViCARP',

            ],
            [
                'name'=>'Region IX – Zamboanga Peninsula',
                'consortium'=>'WESMAARRDEC',

            ],
            [
                'name'=>'Region X – Northern Mindanao',
                'consortium'=>'NOMCAARRD',

            ],
            [
                'name'=>'Region XI – Davao Region',
                'consortium'=>'SMAARRDEC',

            ],
            [
                'name'=>'Region XII – SOCCSKSARGEN',
                'consortium'=>'SOXAARRDEC',

            ],
            [
                'name'=>'Region XIII – Caraga',
                'consortium'=>'CCAARRD',

            ],
            [
                'name'=>'CAR – Cordillera Administrative Region',
                'consortium'=>'CorCAARRD',
            ],
            [
                'name'=>'BARMM – Bangsamoro Autonomous Region in Muslim Mindanao',
            ],

        ];
        foreach ($data as $val)
        {
            IptbmRegion::create($val);
        }
    }
}
