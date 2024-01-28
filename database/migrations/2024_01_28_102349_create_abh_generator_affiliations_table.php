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
        Schema::create('abh_generator_affiliations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_generator_id')->constrained('abh_generators')->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignId('abh_agency_id')->constrained('abh_agencies')->cascadeOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_generator_affiliations');
    }
};
