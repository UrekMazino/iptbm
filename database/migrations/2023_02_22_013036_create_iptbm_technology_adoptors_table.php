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
        Schema::create('iptbm_technology_adoptors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('full_tech_id')->constrained('iptbm_full_tech_descriptions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('adoptor_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_technology_adoptors');
    }
};
