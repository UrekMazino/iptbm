<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\iptbm\AgencySeeder;
use Database\Seeders\iptbm\CommoditySeeder;
use Database\Seeders\iptbm\FullTechSeeder;
use Database\Seeders\iptbm\IndustrySeeder;
use Database\Seeders\iptbm\InventorSeeder;
use Database\Seeders\iptbm\IpAdopterSeeder;
use Database\Seeders\iptbm\IpTypeSeeder;
use Database\Seeders\iptbm\ProfileSeeder;
use Database\Seeders\iptbm\ProtectionStatusSeeder;
use Database\Seeders\iptbm\RegionSeeder;
use Database\Seeders\iptbm\TechCategorySeeder;
use Database\Seeders\iptbm\TechnologySeeder;
use Database\Seeders\iptbm\TechTRansSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            IptbmAdminSeeder::class,
     /*
      *        RegionSeeder::class,
            AgencySeeder::class,
            InventorSeeder::class,
            ProfileSeeder::class,
            UserSeeder::class,
            IndustrySeeder::class,
            CommoditySeeder::class,
            TechCategorySeeder::class,
            IpAdopterSeeder::class,
            IpTypeSeeder::class,
            TechTRansSeeder::class,
            ProtectionStatusSeeder::class,
            TechnologySeeder::class,
            FullTechSeeder::class
      */

        ]);
    }
}
