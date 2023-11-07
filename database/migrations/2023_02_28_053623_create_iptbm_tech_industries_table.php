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
        Schema::create('iptbm_tech_industries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_technology_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('iptbm_industry_id')->constrained('iptbm_industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_tech_industries');
    }
};
