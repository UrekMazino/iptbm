<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        $data=[
            [
                [
                    'name' => 'Abaca'
                ],
                [
                    'name' => 'Banana'
                ],
                [
                    'name' => 'Cacao'
                ],
                [
                    'name' => 'Cashew'
                ],
                [
                    'name' => 'Citrus'
                ],
                [
                    'name' => 'Coconut'
                ],
                [
                    'name' => 'Coffee'
                ],
                [
                    'name' => 'Corn'
                ],
                [
                    'name' => 'Grains'
                ],
                [
                    'name' => 'Legume-Mungbean'
                ],
                [
                    'name' => 'Legume-Peanut'
                ],
                [
                    'name' => 'Legume-Soybean'
                ],
                [
                    'name' => 'Mango'
                ],
                [
                    'name' => 'Medicinal Plants'
                ],
                [
                    'name' => 'Natural Sources of Dye'
                ],
                [
                    'name' => 'Oil Palm'
                ],
                [
                    'name' => 'Ornamentals-Cutflowers'
                ],
                [
                    'name' => 'Ornamentals-Foliages'
                ],
                [
                    'name' => 'Pili'
                ],
                [
                    'name' => 'Rice'
                ],
                [
                    'name' => 'Rubber'
                ],
                [
                    'name' => 'Rootcrops-Sweet Potato'
                ],
                [
                    'name' => 'Rootcrops-Cassava'
                ],
                [
                    'name' => 'Sericulture and Apiculture'
                ],
                [
                    'name' => 'Sugarcane'
                ],
                [
                    'name' => 'Tropical Fruits-Durian'
                ],
                [
                    'name' => 'Tropical Fruits-Papaya'
                ],
                [
                    'name' => 'Tropical Fruits-Pineapple'
                ],
                [
                    'name' => 'Tropical Fruits-Pommelo'
                ],
                [
                    'name' => 'Tropical Fruits-Jackfruit'
                ],
                [
                    'name' => 'Tropical Fruits-Citrus'
                ],
                [
                    'name' => 'Vegetables'
                ],
            ],
            [
                [
                    'name' => 'Carabao-Dairy'
                ],
                [
                    'name' => 'Carabao-Meat'
                ],
                [
                    'name' => 'Cattle-Dairy'
                ],
                [
                    'name' => 'Cattle-Meat'
                ],
                [
                    'name' => 'Duck'
                ],
                [
                    'name' => 'Feed Resources'
                ],
                [
                    'name' => 'Goat'
                ],
                [
                    'name' => 'Poultry-Chicken (meat)'
                ],
                [
                    'name' => 'Poultry-Chicken (eggs)'
                ],
                [
                    'name' => 'Poultry-Duck (meat)'
                ],
                [
                    'name' => 'Poultry-Duck (eggs)'
                ],
                [
                    'name' => 'Native Animals-Chicken'
                ],
                [
                    'name' => 'Native Animals-Duck'
                ],
                [
                    'name' => 'Native Animals-Swine'
                ],
                [
                    'name' => 'Native Animals-Goat'
                ],
                [
                    'name' => 'Quail'
                ],
                [
                    'name' => 'Rabbit'
                ],
                [
                    'name' => 'Sheep'
                ],
                [
                    'name' => 'Swine'
                ],

            ],
            [
                [
                    'name' => 'Abalone'
                ],
                [
                    'name' => 'Blue Swimming Crab'
                ],
                [
                    'name' => 'Cephalopod-cuttlefish'
                ],
                [
                    'name' => 'Cephalopod-octopus'
                ],
                [
                    'name' => 'Cephalopod-squid'
                ],
                [
                    'name' => 'Shellfish – Oyster'
                ],
                [
                    'name' => 'Sardines'
                ],
                [
                    'name' => 'Sea cucumber'
                ],
                [
                    'name' => 'Seaweeds'
                ],
                [
                    'name' => 'Tuna'
                ],
                [
                    'name' => 'Brackishwater fishes-Kitang'
                ],
                [
                    'name' => 'Brackishwater fishes-Pompano'
                ],
                [
                    'name' => 'Freshwater fishes-Goby/Pijango'
                ],
                [
                    'name' => 'Freshwater fishes-Pigek'
                ],
                [
                    'name' => 'Mangrove Crab'
                ],
                [
                    'name' => 'Milkfish '
                ],
                [
                    'name' => 'Shellfish - Mussel'
                ],
                [
                    'name' => 'Shrimp'
                ],
                [
                    'name' => 'Tilapia'
                ],
                [
                    'name' => 'Aqua-feeds'
                ],
            ],
            [
                [
                    'name' => 'Bamboo'
                ],
                [
                    'name' => 'Industrial Tree Plantation'
                ],
                [
                    'name' => 'Industrial Tree Plantation-Falcata'
                ],
                [
                    'name' => 'Industrial Tree Plantation-Yemane'
                ],
                [
                    'name' => 'Rattan'
                ],
                [
                    'name' => 'Rubber'
                ],
                [
                    'name' => 'Sago'
                ],
                [
                    'name' => 'Tiger Grass'
                ],
                [
                    'name' => 'Vines and other non-timber'
                ],
            ],
            [
                [
                    'name' => 'Biodiversity-Ecosystem'
                ],
                [
                    'name' => 'Biodiversity-Ecotourism'
                ],
                [
                    'name' => 'Biodiversity-Flora and Fauna'
                ],
                [
                    'name' => 'Biodiversity-Forestry'
                ],
                [
                    'name' => 'Biodiversity-Inland'
                ],
                [
                    'name' => 'Biodiversity-Marine'
                ],
                [
                    'name' => 'Biodiversity-Microbial'
                ],
                [
                    'name' => 'Inland Environmental Services (IES)-Climate Change',
                ],
                [
                    'name' => 'Inland Environmental Services (IES)-Watershed',
                ],
                [
                    'name' => 'Marine Environmental Services (MES)-Coral',
                ],
                [
                    'name' => 'Marine Environmental Services (MES)-Harmful Algal Bloom',
                ],
            ],

        ];



        $industry=IptbmIndustry::all();
        foreach ($industry as $key => $val)
        {
            if($key<5){
                $val->commodities()->createMany($data[$key]);
            }

        }
    }
}
