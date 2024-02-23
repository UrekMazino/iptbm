<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhTechCategory;
use App\Models\abh\AbhTechIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechCategorySeeder extends Seeder
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
        $data_category = [
            'CROPS'=>[
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
            'LIVESTOCK'=>[
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
            'MARINE AND INLAND AQUATIC'=>[
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
            'FORESTRY'=>[
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
            'ENVIRONMENTAL SERVICES'=>[
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
            'CLIMATE CHANGE ADAPTATION AND DISASTER RISK REDUCTION'=>[
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

        $industries=AbhTechIndustry::all();
        foreach ($industries as $industry)
        {
            if(array_key_exists($industry->name,$data_category))
            {
                foreach ($data_category[$industry->name] as $category)
                {
                    $industry->categories()->save(new AbhTechCategory([
                        'name' => $category['name'],
                    ]));
                }
            }
        }

    }
}
