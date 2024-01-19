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
        Schema::create('abh_tech_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_technology_profile_id')->constrained('abh_technology_profiles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('abh_agency_id')->constrained('abh_agencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_tech_owners');
    }
};
