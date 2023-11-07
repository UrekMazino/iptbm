<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iptbm_tech_research_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_technology_id')->constrained('iptbm_technology_profiles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('agency_name')->nullable();
            $table->double('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_tech_research_projects');
    }
};
