<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmTechProtectionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtectionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'protection_status' => 'For filing'
            ],
            [
                'protection_status' => 'Filed, not yet granted'
            ],
            [
                'protection_status' => 'Granted'
            ],
            [
                'protection_status' => 'Active'
            ],
            [
                'protection_status' => 'Withdrawn'
            ],
            [
                'protection_status' => 'Abandoned'
            ],
            [
                'protection_status' => 'Expired'
            ],
            [
                'protection_status' => 'For revival'
            ],

        ];

        foreach($data as $val)
        {
            IptbmTechProtectionStatus::create($val);
        }
    }
}
