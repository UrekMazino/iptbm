<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iptbm_tech_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_technology_profiles_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('iptbm_agencies_id')->constrained('iptbm_agencies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_tech_owners');
    }
};
