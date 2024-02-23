<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhTechCategory;
use App\Models\abh\AbhTechCommodity;
use App\Models\abh\AbhTechIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbhIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
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
        $data_commodity = [
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

        $data_category = [
            [
                [
                    'name' => 'Germplasm evaluation, conservation, utilization, and management '
                ],
                [
                    'name' => 'Varietal improvement and selection '
                ],
                [
                    'name' => 'Production of good quality seeds and planting materials a. Development/optimization of seed production protocols b. Establishment of a sustainable seed system '
                ],
                [
                    'name' => 'Cultural Management Practices - Soil health, nutrient, and water management '
                ],
                [
                    'name' => 'Cultural Management Practices - Development of biofertilizers and soil fertility enhancers '
                ],
                [
                    'name' => 'Cultural Management Practices - Development of eco-friendly pest and disease management and control strategies '
                ],
                [
                    'name' => 'Cultural Management Practices - Development of crop disease diagnostic kits/techniques and disease management protocols '
                ],
                [
                    'name' => 'Cultural Management Practices - Organic Agriculture '
                ],
                [
                    'name' => 'Crop production systems research - Smart farming approaches'
                ],
                [
                    'name' => 'Crop production systems research - Off-season production and cultivation'
                ],
                [
                    'name' => 'Crop production systems research - Development of climate-resilient technologies '
                ],
                [
                    'name' => 'Crop production systems research - Decision support systems '
                ],
                [
                    'name' => 'Postharvest, processing, and product development'
                ],
            ],
            [
                [
                    'name' => 'Breed development and genetic improvement (for meat, dairy, and draft)'
                ],
                [
                    'name' => 'Reproductive biotechniques for priority livestock species'
                ],
                [
                    'name' => 'Nutrition feeds and feeding system'
                ],
                [
                    'name' => 'Conservation and improvement of native animals'
                ],
                [
                    'name' => 'Vaccine, biologics, and diagnostics development'
                ],
                [
                    'name' => 'Detection of chemical residues and anti-microbial resistance'
                ],
                [
                    'name' => 'Production and management decision support systems'
                ],
            ],
            [
                [
                    'name' => 'Application of genomics in the study of diseases of aquatic species, improving fish resistance to climate change; molecular phylogenetics; population genetics'
                ],
                [
                    'name' => 'New cultivable species for culture'
                ],
                [
                    'name' => 'Development/Refinement of culture systems (broodstock management, hatchery, nursery, grow-out)'
                ],
                [
                    'name' => 'Fish health, disease diagnostics, and disease management'
                ],
                [
                    'name' => 'Nutrition feeds and feeding systems'
                ],
                [
                    'name' => 'Postharvest handling, processing, and new product development'
                ],
                [
                    'name' => 'Mechanization and automated systems for feeding, water and culture management and post-production'
                ],
                [
                    'name' => 'Fishkill warning and mitigation systems and environmental management for sustainable aquaculture'
                ],
                [
                    'name' => 'Management of fisheries'
                ],
                [
                    'name' => 'Product development and processing'
                ],
            ],
            [
                [
                    'name' => 'Development and sustainable management practices'
                ],
                [
                    'name' => 'Development of high-yielding varieties (HYVs) of priority timber species with superior traits'
                ],
                [
                    'name' => 'Production protocols for the propagation of quality timber and non-timber forest planting materials'
                ],
                [
                    'name' => 'Development of sustainable harvesting and postharvest techniques/technologies and marketing strategies for timber and non-timber forest species/products'
                ],
            ],
            [
                [
                    'name' => 'Sustainable utilization, conservation and management of biodiversity in terrestrial, forestry and marine ecosystems'
                ],
                [
                    'name' => 'Sustainable watershed management and utilization'
                ],
                [
                    'name' => 'Management and rehabilitation of problem, degraded and polluted agricultural soils through remediation'
                ],
                [
                    'name' => 'Development of high value products from agricultural and forest wastes'
                ],
                [
                    'name' => 'Strategies/decision management tools for climate change resilient environment'
                ],
                [
                    'name' => 'Resource and ecosystems assessment and monitoring'
                ],
                [
                    'name' => 'Habitat management for fishery and ecosystem sustainability'
                ],
                [
                    'name' => 'Marine environmental management (to include Harmful Algal Blooms, coastal integrity/erosion, fish kills and eutrophication)'
                ],
                [
                    'name' => 'Innovative management systems for unique landscapes and ecosystems'
                ],
            ],
            [
                [
                    'name' => 'Mitigation and adaptation studies (including protected agriculture, vertical agriculture)'
                ],
                [
                    'name' => 'Development of smart farming approaches (including organic agriculture, integrated farming, ICT application) and other climate-resilient agricultural production technologies'
                ],
                [
                    'name' => 'Development of strategies/decision management tools for climate change resilient environment (e.g. farm diversification)'
                ],
                [
                    'name' => 'Enhancing sustainable development through lifescape-landscape approach'
                ],
            ],
        ];

        foreach ($data as $key=>$val)
        {
           $indus= AbhTechIndustry::create($val);
           if(array_key_exists($key,$data_commodity))
           {
               foreach ($data_commodity[$key] as $commodity)
               {
                   $indus->commodities()->save(new AbhTechCommodity($commodity));
               }
           }
            if(array_key_exists($key,$data_category))
            {
                foreach ($data_category[$key] as $category)
                {
                    $indus->categories()->save(new AbhTechCategory($category));
                }
            }

        }

    }
}
