<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmAdoptor;
use Illuminate\Database\Seeder;

class IpAdopterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Farmers',
            ],
            [
                'name' => 'Fisherfolks',
            ],
            [
                'name' => 'Manufacturers',
            ],
            [
                'name' => 'Seed companies',
            ],
            [
                'name' => 'Feed producers',
            ],
            [
                'name' => 'Machine fabricators',
            ],
            [
                'name' => 'National Government',
            ],
            [
                'name' => 'Regulatory bodies',
            ],
            [
                'name' => 'Local Government Units',
            ],
            [
                'name' => 'Policy Makers',
            ],
            [
                'name' => 'Students',
            ],
            [
                'name' => 'Other',
            ],
        ];
        foreach ($data as $val) {
            IptbmAdoptor::create($val);
        }

    }
}
