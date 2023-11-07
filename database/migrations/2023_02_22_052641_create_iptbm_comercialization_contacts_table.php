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
        Schema::create('iptbm_comercialization_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commercialization_id')->constrained('iptbm_commercialization_pathways')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_comercialization_contacts');
    }
};
