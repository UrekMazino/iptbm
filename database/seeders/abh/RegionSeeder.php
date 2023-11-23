<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhRegion;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbhRegion::create([
            'id' => '1',
            'name' => 'Sasmple abh Region'
        ]);
    }
}
