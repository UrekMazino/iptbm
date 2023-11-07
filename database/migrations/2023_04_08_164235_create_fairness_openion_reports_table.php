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
        Schema::create('fairness_openion_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('precom_id')->constrained('iptbm_commercialization_precoms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pdf_file')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fairness_openion_reports');
    }
};
