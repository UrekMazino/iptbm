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
        Schema::create('iptbm_commercialization_adopters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technology_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('company_name')->nullable();
            $table->text('address')->nullable();
            $table->text('company_description')->nullable();
            $table->string('business_structures')->nullable();
            $table->string('business_registration')->nullable();
            $table->string('acquisition_model')->nullable();
            $table->boolean('for_incubation')->defaultFalse();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_commercialization_adopters');
    }
};
