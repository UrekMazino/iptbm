<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmFullTechDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FullTechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($x=3; $x<=40;$x++)
        {
            if($x!=13)
            {
                IptbmFullTechDescription::create([
                    'id' => $x,
                    'iptbm_technology_profile_id'=>$x
                ]);
            }

        }


    }
}
