<?php

namespace Database\Seeders\abh;

use App\Models\abh\AbhProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbhProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         *           $table->string('rrdc_chair')->nullable();
            $table->string('consortium_dir')->nullable();
            $table->string('office_address')->nullable();
            $table->string('project_leader')->nullable();
            $table->string('manager')->nullable();
            $table->year('year_established')->nullable();
            $table->boolean('ip_policy')->nullable();
            $table->boolean('techno_transfer')->nullable();
            $table->string('logo')->comment('Uploaded in JPEG, PNG, or PDF copies url only')->nullable();
            $table->string('tag_line')->nullable();
         */
        AbhProfile::create([
           'rrdc_chair'=>'Sample RRDC Chair'
        ]);
    }
}
